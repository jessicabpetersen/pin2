/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package br.udesc.ceavi.pin2.EulerAPI.repositorio;

import br.udesc.ceavi.pin2.EulerAPI.model.Academico;
import org.springframework.data.jpa.repository.JpaRepository;

/**
 *
 * @author 42519630833
 */
public interface AcademicoRepositorio extends JpaRepository<Academico, Long> {
    
}
