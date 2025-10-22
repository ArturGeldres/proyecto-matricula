package com.ie7073.sistema.entity;

import jakarta.persistence.*;
import lombok.Data;

@Data // (de Lombok) Crea getters, setters, toString, etc. automáticamente
@Entity
@Table(name = "usuarios")
public class Usuario {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;

    @Column(nullable = false, length = 100)
    private String nombre;

    @Column(nullable = false, unique = true, length = 50)
    private String usuario;

    @Column(nullable = false, length = 255)
    private String password;

    @Column(nullable = false)
    private Integer rol;
}