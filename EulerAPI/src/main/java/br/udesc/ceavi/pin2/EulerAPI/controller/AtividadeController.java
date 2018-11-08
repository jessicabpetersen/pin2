/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.udesc.ceavi.pin2.EulerAPI.controller;

import br.udesc.ceavi.pin2.EulerAPI.model.Atividade;
import br.udesc.ceavi.pin2.EulerAPI.repositorio.AtividadeRepositorio;
import java.util.List;
import java.util.Optional;
import org.springframework.beans.BeanUtils;
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
@RequestMapping("/atividades")
public class AtividadeController {
    
    private AtividadeRepositorio atr;
    
    @GetMapping("/{id}")
    public Atividade buscar(@PathVariable long id) {
        return atr.findById(id).get();
    }

    @GetMapping
    public List<Atividade> buscar() {
        return atr.findAll();
    }

    @PostMapping
    public Atividade salvar(@RequestBody Atividade atividade) {
        return atr.save(atividade);
    }

    @DeleteMapping("/{id}")
    public void deletar(@PathVariable long id) {
        atr.deleteById(id);
    }

    @PutMapping("/{id}")
    public Atividade atualizar(@PathVariable long id, @RequestBody Atividade atividade) {

        Optional<Atividade> atividadeSalvo = atr.findById(id);
        Atividade a = atividadeSalvo.get();//Transforma optional na entidade
        BeanUtils.copyProperties(atividade, a, "id");
        atr.save(a);

        return a;
    }
    
}
