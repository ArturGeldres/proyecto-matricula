package com.ie7073.sistema.config;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.config.annotation.web.configuration.EnableWebSecurity;
import org.springframework.security.web.SecurityFilterChain;

@Configuration
@EnableWebSecurity
public class SecurityConfig {

    @Bean
    public SecurityFilterChain securityFilterChain(HttpSecurity http) throws Exception {
        http
            // Deshabilitar CSRF (la protección que está bloqueando tu PHP)
            .csrf(csrf -> csrf.disable()) 
            
            // Autorizar todas las solicitudes a tu API
            .authorizeHttpRequests(authz -> authz
                .requestMatchers("/api/**").permitAll() // Permite todo bajo /api/
                .anyRequest().authenticated() // Requiere autenticación para cualquier otra cosa (aunque no aplica ahora)
            );

        return http.build();
    }
}