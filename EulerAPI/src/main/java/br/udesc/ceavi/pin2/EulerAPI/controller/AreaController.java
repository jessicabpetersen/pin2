/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.udesc.ceavi.pin2.EulerAPI.controller;

import br.udesc.ceavi.pin2.EulerAPI.model.Area;
import br.udesc.ceavi.pin2.EulerAPI.repositorio.AreaRepositorio;
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
@RequestMapping("/areas")
public class AreaController {

    @Autowired
    private AreaRepositorio arr;

    @GetMapping("/{id}")
    public Area buscar(@PathVariable long id) {
        return arr.findById(id).get();
    }

    @GetMapping
    public List<Area> buscar() {
        return arr.findAll();
    }

    @PostMapping
    public Area salvar(@RequestBody Area area) {
        return arr.save(area);
    }

    @DeleteMapping("/{id}")
    public void deletar(@PathVariable long id) {
        arr.deleteById(id);
    }

    @PutMapping("/{id}")
    public Area atualizar(@PathVariable long id, @RequestBody Area area) {

        Optional<Area> areaSalvo = arr.findById(id);
        Area a = areaSalvo.get();//Transforma optional na entidade
        BeanUtils.copyProperties(area, a, "id");
        arr.save(a);

        return a;
    }
}
