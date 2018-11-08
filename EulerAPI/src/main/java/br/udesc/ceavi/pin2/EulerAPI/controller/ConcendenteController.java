/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.udesc.ceavi.pin2.EulerAPI.controller;

import br.udesc.ceavi.pin2.EulerAPI.model.Concendente;
import br.udesc.ceavi.pin2.EulerAPI.repositorio.ConcendenteRepositorio;
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
@RequestMapping("/concendentes")
public class ConcendenteController {

    @Autowired
    private ConcendenteRepositorio cr;

    @GetMapping("/{id}")
    public Concendente buscar(@PathVariable long id) {
        return cr.findById(id).get();
    }

    @GetMapping
    public List<Concendente> buscar() {
        return cr.findAll();
    }

    @PostMapping
    public Concendente salvar(@RequestBody Concendente c) {
        return cr.save(c);
    }

    @DeleteMapping("/{id}")
    public void deletar(@PathVariable long id) {
        cr.deleteById(id);
    }

    @PutMapping("/{id}")
    public Concendente atualizar(@PathVariable long id, @RequestBody Concendente c) {

        Optional<Concendente> cSalvo = cr.findById(id);
        Concendente cs = cSalvo.get();//Transforma optional na entidade
        BeanUtils.copyProperties(c, cs, "id");
        cr.save(cs);

        return cs;
    }
}
