package com.ie7073.sistema.dto;

import lombok.AllArgsConstructor;
import lombok.Data;

@Data
@AllArgsConstructor // Crea un constructor con todos los argumentos
public class AuthResponse {
    private String mensaje;
    private String nombre;
    private Integer rol;
}