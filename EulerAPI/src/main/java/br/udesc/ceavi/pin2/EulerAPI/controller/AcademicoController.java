/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.udesc.ceavi.pin2.EulerAPI.controller;

import br.udesc.ceavi.pin2.EulerAPI.model.Academico;
import br.udesc.ceavi.pin2.EulerAPI.repositorio.AcademicoRepositorio;
import java.util.List;
import java.util.Optional;
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
@RequestMapping("/academicos")
public class AcademicoController {
    
    @Autowired
    private AcademicoRepositorio ar;

    @GetMapping("/{id}")
    public Academico buscar(@PathVariable long id) {
        return ar.findById(id).get();
    }

    @GetMapping
    public List<Academico> buscar() {
        return ar.findAll();
    }

    @PostMapping
    public Academico salvar(@RequestBody Academico academico) {
        return ar.save(academico);
    }

    @DeleteMapping("/{id}")
    public void deletar(@PathVariable long id) {
        ar.deleteById(id);
    }
    
    
    @PutMapping("/{id}")
    public Academico atualizar(@PathVariable long id, @RequestBody Academico academico){
        
        Optional<Academico> academicoSalvo = ar.findById(id);
        Academico a = academicoSalvo.get();//Transforma optional na entidade
        BeanUtils.copyProperties(academico, a, "id");
        ar.save(a);
        
        return a;
    }
}
