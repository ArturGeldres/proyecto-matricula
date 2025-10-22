package com.ie7073.sistema.repository;

import com.ie7073.sistema.entity.Usuario;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.Optional;

@Repository
public interface UsuarioRepository extends JpaRepository<Usuario, Integer> {
    // Spring Data JPA creará automáticamente la consulta:
    // "SELECT * FROM usuarios WHERE usuario = ?"
    Optional<Usuario> findByUsuario(String usuario);
}