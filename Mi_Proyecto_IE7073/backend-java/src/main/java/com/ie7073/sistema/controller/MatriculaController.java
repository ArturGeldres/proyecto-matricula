package com.ie7073.sistema.controller;

import com.ie7073.sistema.dto.EstadoRequest;
import com.ie7073.sistema.entity.Matricula;
import com.ie7073.sistema.repository.MatriculaRepository;
import jakarta.validation.Valid;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.Map;
import java.util.Optional;

@RestController
@RequestMapping("/api/matriculas")
@CrossOrigin // Permite llamadas desde PHP
public class MatriculaController {

    @Autowired
    private MatriculaRepository matriculaRepository;

    /**
     * Microservicio 2: Registrar una nueva matrícula.
     * Reemplaza la lógica de matricula.php
     */
    @PostMapping("/registrar")
    public ResponseEntity<?> registrarMatricula(@Valid @RequestBody Matricula nuevaMatricula) {
        
        // 1. Revisar si el DNI ya está registrado
        if (matriculaRepository.findByDni(nuevaMatricula.getDni()).isPresent()) {
            // Equivalente a tu error "El alumno con DNI ya completó el formulario"
            return ResponseEntity.status(HttpStatus.CONFLICT)
                                 .body(Map.of("mensaje", "Error: El DNI ya está registrado."));
        }

        // 2. Guardar la matrícula
        // La lógica de @PrePersist en la entidad Matricula.java
        // asignará automáticamente el estado 'pendiente' y la fecha.
        Matricula matriculaGuardada = matriculaRepository.save(nuevaMatricula);

        return ResponseEntity.status(HttpStatus.CREATED)
                             .body(Map.of(
                                 "mensaje", "Matrícula registrada correctamente. Estado: pendiente.",
                                 "id", matriculaGuardada.getId()
                             ));
    }

    /**
     * Microservicio 3: Aprobar o Rechazar matrícula.
     * Reemplaza la lógica de update_matricula_ajax.php
     */
    @PutMapping("/estado/{id}")
    public ResponseEntity<?> actualizarEstado(
            @PathVariable Integer id,
            @RequestBody EstadoRequest estadoRequest) {
        
        // 1. Buscar la matrícula por ID
        Optional<Matricula> optMatricula = matriculaRepository.findById(id);

        if (optMatricula.isEmpty()) {
            return ResponseEntity.status(HttpStatus.NOT_FOUND)
                                 .body(Map.of("mensaje", "Matrícula no encontrada"));
        }

        // 2. Actualizar el estado
        Matricula matricula = optMatricula.get();
        String nuevoEstado = estadoRequest.getEstado(); // 'aprobado' o 'rechazado'

        if (!nuevoEstado.equals("aprobado") && !nuevoEstado.equals("rechazado")) {
             return ResponseEntity.status(HttpStatus.BAD_REQUEST)
                                 .body(Map.of("mensaje", "Estado no válido"));
        }

        matricula.setEstado(nuevoEstado);
        matriculaRepository.save(matricula);

        // Equivalente a tu "ok"
        return ResponseEntity.ok(Map.of("mensaje", "Estado actualizado a " + nuevoEstado));
    }
}