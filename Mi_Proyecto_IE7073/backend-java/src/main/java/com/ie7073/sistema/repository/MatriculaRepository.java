package com.ie7073.sistema.repository;

import com.ie7073.sistema.entity.Matricula;
import java.util.List;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.Optional;

@Repository
public interface MatriculaRepository extends JpaRepository<Matricula, Integer> {
    // "SELECT * FROM matriculas WHERE dni = ?"
    Optional<Matricula> findByDni(String dni);
    
    

    List<Matricula> findByGradoAndSeccionAndEstado(String grado, String seccion, String estado);
}