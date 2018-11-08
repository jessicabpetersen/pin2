/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.udesc.ceavi.pin2.EulerAPI.controller;

import br.udesc.ceavi.pin2.EulerAPI.model.Estagio;
import br.udesc.ceavi.pin2.EulerAPI.repositorio.AcademicoRepositorio;
import br.udesc.ceavi.pin2.EulerAPI.repositorio.AreaRepositorio;
import br.udesc.ceavi.pin2.EulerAPI.repositorio.ConcendenteRepositorio;
import br.udesc.ceavi.pin2.EulerAPI.repositorio.EstagioRepositorio;
import java.util.List;
import java.util.Optional;
import javax.swing.JOptionPane;
import org.springframework.beans.BeanUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

/**
 *
 * @author 42519630833
 */
@RestController
@RequestMapping("/estagios")
public class EstagioController {

    @Autowired
    private EstagioRepositorio er;

    @GetMapping("/{id}")
    public Estagio buscar(@PathVariable long id) {
        return er.findById(id).get();
    }

    @GetMapping
    public List<Estagio> buscar() {
        return er.findAll();
    }

    @PostMapping
    public Estagio salvar(@RequestBody Estagio end) {
        System.out.println(end.getAcademico());
        return er.save(end);
    }

    @PostMapping("/acadsalvo/{idAcademico}/concendente/{idConcendente}/area/{idArea}")
    public Estagio salvarComAcademicoSalvo(@PathVariable long idAcademico,@PathVariable long idConcendente,@PathVariable long idArea, @RequestBody Estagio estagio) {
        
        AcademicoRepositorio ar = null;
        ConcendenteRepositorio cr = null;
        AreaRepositorio arear = null;
        
        estagio.setAcademico(ar.findById(idAcademico).get()); 
        estagio.setConcendente(cr.findById(idConcendente).get());
        estagio.setArea(arear.findById(idArea).get());
        
        return er.save(estagio);
    }

    @DeleteMapping("/{id}")
    public void deletar(@PathVariable long id) {
        er.deleteById(id);
    }

    @PutMapping("/{id}")
    public Estagio atualizar(@PathVariable long id, @RequestBody Estagio estagio) {

        Optional<Estagio> estagioSalvo = er.findById(id);
        Estagio es = estagioSalvo.get();//Transforma optional na entidade
        BeanUtils.copyProperties(estagio, es, "id");
        er.save(es);

        return es;
    }
}
