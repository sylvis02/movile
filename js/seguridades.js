$(document).ready(function() {
/////////////////////////////////////////////////////////////////////////////////////////////
				//Gestion Movilizacion
				$("#smu_mov_sol").click(function() 
				{
				$('#contenido').html('');
				$('#contenido').load(base_url+'movilizacion/solicitud');
				return false;
	            });
				
				$("#smu_mov_aprob").click(function() 
				{
				$('#contenido').html('');
				$('#contenido').load(base_url+'movilizacion/asignar_vehiculo');
				//$('#fconcope').show();				
				return false;
	            });

				$("#smu_mov_gen_ord").click(function() 
				{
				$('#contenido').html('');
				$('#contenido').load(base_url+'movilizacion/aprobarCombustible');
				//$('#fconcope').show();				
				return false;
	            });


				$("#smu_mov_desp").click(function() 
				{
				$('#contenido').html('');
				$('#contenido').load(base_url+'movilizacion/listarOrdenesCombustible');
				//$('#fconcope').show();				
				return false;
	            });
				

//////////////////////////////////////////////////////////////////////////////////////////////////
	            //talleres

				$("#smu_tall_sol").click(function() 
				{
				$('#contenido').html('');
				$('#contenido').load(base_url+'talleres/solicitudMantenimiento');
				//$('#fconcope').show();				
				return false;
	            });
				$("#smu_tall_mantenimiento").click(function() 
				{
				$('#contenido').html('');
				$('#contenido').load(base_url+'talleres/historial_mantenimiento_view');
				//$('#fconcope').show();				
				return false;
	            });
				
				$("#smu_tall_gen_ped").click(function() 
				{
				$('#contenido').html('');
				$('#contenido').load(base_url+'talleres/plan_preventivo');
				//$('#fconcope').show();				
				return false;
	            });
				
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				
				//ADMINISTRACION

				$("#smu_usu_cond_list").click(function() 
				{
				$('#contenido').html('');
				$('#contenido').load(base_url+'administracion/listadoUsuarios');
				return false;
	            });

				$("#smu_vehi_cond_list").click(function() 
				{
				$('#contenido').html('');
				$('#contenido').load(base_url+'administracion/listadoVehiculos_conductores');
				//$('#fconcope').show();				
				return false;
	            });
			
				$("#smu_tipos").click(function() 
				{
				$('#contenido').html('');
				$('#contenido').load(base_url+'administracion/tipos_vehiculos');
				return false;
	            });
				$("#smu_licencia").click(function() 
				{
				$('#contenido').html('');
				$('#contenido').load(base_url+'administracion/listadoTipoLicencia');
				//$('#fconcope').show();				
				return false;
	            });

				$("#smu_combustible").click(function() 
				{
				$('#contenido').html('');
				$('#contenido').load(base_url+'administracion/listCombustibles');
				//$('#fconcope').show();				
				return false;
	            });

	            $("#smu_gasolinera").click(function() 
				{
				$('#contenido').html('');
				$('#contenido').load(base_url+'administracion/listadoGasolineras');
				//$('#fconcope').show();				
				return false;
	            });

	            $("#smu_reg_vehi").click(function() 
				{
				$('#contenido').html('');
				$('#contenido').load(base_url+'administracion/listaVehiculosFinan');
				//$('#fconcope').show();				
				return false;
	            });

///////////////////////////////////////////////////////////////////////////////////////////////	            
///////////////////////////////////////////////////////////////////////////////////////////////
	
	//REPORTES
	            $("#smu_report_combus").click(function() 
				{
				$('#contenido').html('');
				$('#contenido').load(base_url+'movilizacion/reporte_combustible_view');
				//$('#fconcope').show();				
				return false;
	            });
	            $("#smu_vehi_nue").click(function() 
				{
				$('#contenido').html('');
				$('#contenido').load(base_url+'administracion/reporte_vehiculos');
				//$('#fconcope').show();				
				return false;
	            });
	            $("#smu_cond_list").click(function() 
				{
				$('#contenido').html('');
				$('#contenido').load(base_url+'administracion/reporte_condutores');
				//$('#fconcope').show();				
				return false;
	            });

	            $("#smu_control_mante").click(function() 
				{
				$('#contenido').html('');
				$('#contenido').load(base_url+'talleres/reporte_control_mantenimiento_view');
				//$('#fconcope').show();			
				return false;
	            });

	            $("#smu_repo_mat_soat").click(function() { 
	            $('#contenido').html(''); 
	            $('#contenido').load(base_url+'administracion/reporte_matriculaSoat'); 
	            return false; 
	            });

	            $("#smu_mov_orden_movi").click(function() 
				{
				$('#contenido').html('');
				$('#contenido').load(base_url+'movilizacion/reporte_movilizacion_view');
				//$('#fconcope').show();				
				return false;
	            });

				$("#menu1").click(function() 
				{
                
				$('.smenus').show();
	            });
		});
