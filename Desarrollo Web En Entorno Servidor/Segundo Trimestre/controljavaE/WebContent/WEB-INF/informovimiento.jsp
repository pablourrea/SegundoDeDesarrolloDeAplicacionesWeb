<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page import="modelo.Movimiento" %>


<%-- Importo las clases necesarias --%>
<%@ page  import="java.util.ArrayList" %>
<%@ page import="modelo.Movimiento" %>
<!-- Creo que la vista esta OK -->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Consulta de movimientos </title>
</head>
<body>
<%
Movimiento m =  (Movimiento) request.getAttribute("cod_cliente");
if ( m == null){
	out.println(" <h1> Movimientos del usuario no encontrado.</h1>");
}
else {
%>

<!-- Tabla azul VISTA -->
<table border="1">
<tr>
<th>num_mov</th>
<th>cod_cliente</th>
<th>concepto</th>
<th>importe </th>
<tr>
<td><%= m.getNum_mov() %></td>
<td><%= m.getCod_cliente() %></td>
<td><%= m.getConcepto() %></td> 
<td><%= m.getImporte()  %></td>
</tr>
</table>
<% } %>
</body>
</html>