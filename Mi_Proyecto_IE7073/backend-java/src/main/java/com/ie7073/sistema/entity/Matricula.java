package com.ie7073.sistema.entity;

import jakarta.persistence.*;
import lombok.Data;
import java.time.LocalDate;

@Data
@Entity
@Table(name = "matriculas")
public class Matricula {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;

    @Column(unique = true, nullable = false, length = 20)
    private String dni;

    @Column(name = "apellido_paterno", nullable = false, length = 100)
    private String apellidoPaterno;

    @Column(name = "apellido_materno", nullable = false, length = 100)
    private String apellidoMaterno;

    @Column(nullable = false, length = 150)
    private String nombres;

    @Column(name = "fecha_nacimiento", nullable = false)
    private LocalDate fechaNacimiento;

    @Column(nullable = false, length = 255)
    private String direccion;

    @Column(nullable = false)
    private String nivel;

    @Column(nullable = false)
    private String grado;

    @Column(nullable = false)
    private String seccion;

    @Column(name = "dni_apoderado", nullable = false)
    private String dniApoderado;

    @Column(name = "nombre_apoderado", nullable = false)
    private String nombreApoderado;

    @Column(nullable = false)
    private String parentesco;

    @Column(name = "fecha_matricula")
    private LocalDate fechaMatricula;

    @Column(nullable = false)
    private String estado; // 'pendiente', 'aprobado', 'rechazado'

    // Otros campos que puedes agregar
    private String genero;
    private String telefono;
    private String correo;
    @Column(name = "telefono_apoderado")
    private String telefonoApoderado;
    @Column(name = "correo_apoderado")
    private String correoApoderado;

    // Antes de guardar una nueva matrícula, asignamos la fecha y estado
    @PrePersist
    public void prePersist() {
        this.fechaMatricula = LocalDate.now();
        this.estado = "pendiente";
    }
}