package com.ie7073.sistema.dto;

import lombok.Data;

@Data
public class LoginRequest {
    private String usuario;
    private String password;
}