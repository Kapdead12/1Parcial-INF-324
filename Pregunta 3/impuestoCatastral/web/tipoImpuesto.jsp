<%-- 
    Document   : tipoImpuesto
    Created on : 03-oct-2024, 5:12:33
    Author     : kapa
--%>

<%@ page import="java.util.List" %>
<%@ page import="java.util.ArrayList" %>
<%@ page import="java.util.Arrays" %>  <%-- Importar Arrays para usar el método Arrays.asList --%>

<%@ page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Tipos de Impuesto</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Resultados de Tipos de Impuesto</h1>

        <%
            // Obtener los códigos catastrales enviados
            String[] codigosCatastrales = request.getParameterValues("codigos_catastrales[]");
            List<String[]> tiposImpuesto = new ArrayList<>();

            if (codigosCatastrales != null) {
                for (String codigo : codigosCatastrales) {
                    String tipoImpuesto = "null"; 
                    if (codigo.endsWith("1")) {
                        tipoImpuesto = "Bajo";
                    } else if (codigo.endsWith("2")) {
                        tipoImpuesto = "Medio";
                    } else if (codigo.endsWith("3")) {
                        tipoImpuesto = "Alto";
                    }
                    tiposImpuesto.add(new String[]{codigo, tipoImpuesto});
                }
            } else {
                out.println("<p>No tiene códigos catastrales.</p>");
            }
        %>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Código Catastral</th>
                    <th>Tipo de Impuesto</th>
                </tr>
            </thead>
            <tbody>
                <%
                    if (!tiposImpuesto.isEmpty()) {
                        for (String[] tipo : tiposImpuesto) {
                            out.println("<tr>");
                            out.println("<td>" + tipo[0] + "</td>");
                            out.println("<td>" + tipo[1] + "</td>");
                            out.println("</tr>");
                        }
                    }
                %>
            </tbody>
        </table>
        <a class="btn btn-danger" href="http://localhost/1er%20Parcial%20INF-324/Pregunta%201/dashboard.php">Volver Dashboard</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
