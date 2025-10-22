package com.ie7073.sistema.controller;

import com.ie7073.sistema.dto.AuthResponse;
import com.ie7073.sistema.dto.LoginRequest;
import com.ie7073.sistema.entity.Usuario;
import com.ie7073.sistema.repository.UsuarioRepository;

// --- AÑADE ESTAS IMPORTACIONES ---
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
// --- FIN DE LAS IMPORTACIONES ---

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.web.bind.annotation.*;

import java.util.Optional;

@RestController
@RequestMapping("/api/auth")
@CrossOrigin
public class AuthController {

    // --- AÑADE ESTA LÍNEA PARA CREAR EL LOGGER ---
    private static final Logger logger = LoggerFactory.getLogger(AuthController.class);
    // --- FIN DE LA LÍNEA ---

    @Autowired
    private UsuarioRepository usuarioRepository;

    @Autowired
    private PasswordEncoder passwordEncoder;

    @PostMapping("/login")
    public ResponseEntity<?> login(@RequestBody LoginRequest loginRequest) {
        
        logger.info("Intento de login para el usuario: {}", loginRequest.getUsuario());

        Optional<Usuario> optUsuario = usuarioRepository.findByUsuario(loginRequest.getUsuario());

        if (optUsuario.isEmpty()) {
            logger.warn("Usuario no encontrado: {}", loginRequest.getUsuario());
            return ResponseEntity.status(HttpStatus.NOT_FOUND)
                                 .body(new AuthResponse("Usuario no encontrado", null, null));
        }

        Usuario usuario = optUsuario.get();

        if (passwordEncoder.matches(loginRequest.getPassword(), usuario.getPassword())) {
            logger.info("Login exitoso para el usuario: {}", loginRequest.getUsuario());
            AuthResponse response = new AuthResponse(
                "Login exitoso",
                usuario.getNombre(),
                usuario.getRol()
            );
            return ResponseEntity.ok(response);
            
        } else {
            logger.error("Contraseña incorrecta para el usuario: {}", loginRequest.getUsuario());
            return ResponseEntity.status(HttpStatus.UNAUTHORIZED)
                                 .body(new AuthResponse("Contraseña incorrecta", null, null));
        }
    }
}