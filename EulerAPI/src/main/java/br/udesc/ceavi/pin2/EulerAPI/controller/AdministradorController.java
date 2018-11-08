/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.udesc.ceavi.pin2.EulerAPI.controller;

import br.udesc.ceavi.pin2.EulerAPI.model.Administrador;
import br.udesc.ceavi.pin2.EulerAPI.repositorio.AdministradorRepositorio;
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
@RequestMapping("/administradores")
public class AdministradorController {

    @Autowired
    private AdministradorRepositorio admr;

    @GetMapping("/{id}")
    public Administrador buscar(@PathVariable long id) {
        return admr.findById(id).get();
    }

    @GetMapping
    public List<Administrador> buscar() {
        return admr.findAll();
    }

    @PostMapping
    public Administrador salvar(@RequestBody Administrador adm) {
        return admr.save(adm);
    }

    @DeleteMapping("/{id}")
    public void deletar(@PathVariable long id) {
        admr.deleteById(id);
    }

    @PutMapping("/{id}")
    public Administrador atualizar(@PathVariable long id, @RequestBody Administrador adm) {

        Optional<Administrador> admSalvo = admr.findById(id);
        Administrador a = admSalvo.get();//Transforma optional na entidade
        BeanUtils.copyProperties(adm, a, "id");
        admr.save(a);

        return a;
    }
}
