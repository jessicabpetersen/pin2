/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.udesc.ceavi.pin2.EulerAPI.controller;

import br.udesc.ceavi.pin2.EulerAPI.model.Endereco;
import br.udesc.ceavi.pin2.EulerAPI.repositorio.EnderecoRepositorio;
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
@RequestMapping("/enderecos")
public class EnderecoController {
    
    @Autowired
    private EnderecoRepositorio endr;
    
    @GetMapping("/{id}")
    public Endereco buscar(@PathVariable long id) {
        return endr.findById(id).get();
    }

    @GetMapping
    public List<Endereco> buscar() {
        return endr.findAll();
    }

    @PostMapping
    public Endereco salvar(@RequestBody Endereco end) {
        return endr.save(end);
    }

    @DeleteMapping("/{id}")
    public void deletar(@PathVariable long id) {
        endr.deleteById(id);
    }

    @PutMapping("/{id}")
    public Endereco atualizar(@PathVariable long id, @RequestBody Endereco end) {

        Optional<Endereco> endSalvo = endr.findById(id);
        Endereco es = endSalvo.get();//Transforma optional na entidade
        BeanUtils.copyProperties(end, es, "id");
        endr.save(es);

        return es;
    }
}
