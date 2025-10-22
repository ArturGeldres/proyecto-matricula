package com.ie7073.sistema.controller;

import com.ie7073.sistema.entity.Matricula;
import com.ie7073.sistema.repository.MatriculaRepository;
import org.apache.poi.ss.usermodel.Cell;
import org.apache.poi.ss.usermodel.Row;
import org.apache.poi.ss.usermodel.Sheet;
import org.apache.poi.ss.usermodel.Workbook;
import org.apache.poi.xssf.usermodel.XSSFWorkbook;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpHeaders;
import org.springframework.http.MediaType;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.util.List;

@RestController
@RequestMapping("/api/reportes")
@CrossOrigin
public class ReporteController {

    @Autowired
    private MatriculaRepository matriculaRepository;

    @GetMapping("/alumnos/excel")
    public ResponseEntity<byte[]> generarReporteAlumnos(
            @RequestParam String grado,
            @RequestParam String seccion) throws IOException {

        // 1. Buscar los datos en la base de datos (solo aprobados)
        List<Matricula> alumnos = matriculaRepository.findByGradoAndSeccionAndEstado(grado, seccion, "aprobado");

        // 2. Crear el libro de Excel en memoria
        Workbook workbook = new XSSFWorkbook();
        Sheet sheet = workbook.createSheet("Alumnos " + grado + " " + seccion);

        // 3. Crear la fila de cabecera
        Row headerRow = sheet.createRow(0);
        String[] headers = {"#", "Apellido Paterno", "Apellido Materno", "Nombres", "DNI", "Género"};
        for (int i = 0; i < headers.length; i++) {
            Cell cell = headerRow.createCell(i);
            cell.setCellValue(headers[i]);
        }

        // 4. Llenar las filas con los datos de los alumnos
        int rowNum = 1;
        for (Matricula alumno : alumnos) {
            Row row = sheet.createRow(rowNum++);
            row.createCell(0).setCellValue(rowNum - 1);
            row.createCell(1).setCellValue(alumno.getApellidoPaterno());
            row.createCell(2).setCellValue(alumno.getApellidoMaterno());
            row.createCell(3).setCellValue(alumno.getNombres());
            row.createCell(4).setCellValue(alumno.getDni());
            row.createCell(5).setCellValue(alumno.getGenero());
        }

        // 5. Escribir el libro a un flujo de bytes
        ByteArrayOutputStream outputStream = new ByteArrayOutputStream();
        workbook.write(outputStream);
        workbook.close();

        // 6. Preparar la respuesta HTTP para descargar el archivo
        HttpHeaders httpHeaders = new HttpHeaders();
        httpHeaders.setContentType(MediaType.APPLICATION_OCTET_STREAM);
        httpHeaders.setContentDispositionFormData("attachment", "alumnos_" + grado + "_" + seccion + ".xlsx");

        return ResponseEntity.ok()
                .headers(httpHeaders)
                .body(outputStream.toByteArray());
    }
}