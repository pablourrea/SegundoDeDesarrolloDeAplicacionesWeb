

import java.io.IOException;
import java.util.ArrayList;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import modelo.AccesoDatos;
import modelo.Movimiento;

/**
 * Servlet implementation class Servletconsulta
 */
@WebServlet({ "/Servletconsulta", "/procesarconsulta" })
public class Servletconsulta extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public Servletconsulta() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
			// VARIABLES
			String cod_cliente = request.getParameter("cod_cliente");
			int importeMinimo=0;
			int importeMaximo=0;
			String msg;
			
			try {
				importeMinimo= Integer.parseInt(request.getParameter("min"));
				importeMaximo= Integer.parseInt(request.getParameter("max"));
				
			}catch(Exception e) {
				msg=" Error al introducir el importe";
			}
		
		AccesoDatos mimodelo = AccesoDatos.initModelo(); 
		
		//Comprobar importes
		if(importeMaximo<importeMinimo) {
			msg="Importe incorrecto";
		}
		
		/*
		 * 
		 * COMPLELETAR
		 * //Falta rellenar obtenerListaMovimientos() en AccesoDatos
		 */
		
		if (request.getServletPath().equals("/procesarconsulta")) {
			
			ArrayList<Movimiento> resultado = mimodelo.obtenerListaMovimientos(cod_cliente, importeMinimo, importeMaximo);
			// Añado el atributo a la petición
			request.setAttribute("listamov", resultado);
			// Invoco a la vista que muestra las lista de producto
			// El directorio /WEB-INF no es accesible directamente desde el navegador
			request.getRequestDispatcher("/WEB-INF/informovimiento.jsp").forward(request, response);
			return;
		}
			
		
		if (! mimodelo.hayMovimientos(cod_cliente) ) {
			msg = "El codigo de cliente "+cod_cliente+" no se encuentra en la base de datos ";
			request.setAttribute("msg", msg);
			request.getRequestDispatcher("/WEB-INF/infoerror.jsp").forward(request, response);
			return;
		}
		
		
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
