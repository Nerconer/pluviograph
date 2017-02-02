<?php
/*
 * Author: David Solà Solé (david.sola.sole@gmail.com)
 * Year: 2017 
 */
 
require_once('classes/Data2Bd.class.php');
$db = new Data2Bd();

//$data = $db->getTableOrdered('raw_data');
$data = $db->getTableOrdered('data');

$dataFinal;

$i = 0;
foreach ($data as $data1) {
  $weight = $data1["data"];
  $weight = ($weight/1000)*(1/0.013273);
  $datetime = ((strtotime($data1["time"])+$i) * 1000) + (3600*1000);
  ++$i;
  $dataFinal[] = "[$datetime, $weight]";
}

$json_data = "(".json_encode($dataFinal, JSON_NUMERIC_CHECK).")";

?>

<!DOCTYPE html>
<HTML>
<HEAD>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta charset="utf-8">

<TITLE>OBSERVATORI FABRA</TITLE>
<meta charset="UTF-8">
<LINK href="scss/ViewPage.css" type=text/css rel=stylesheet>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!--<script src="http://code.highcharts.com/highcharts.js"></script>-->
<script src="libraries\Highstock-5.0.2\code\highstock.src.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<style>
<!--
table.MsoTableElegant
	{border:2.25pt double black;
	font-size:10.0pt;
	font-family:"Times New Roman";
	}
 table.MsoNormalTable
	{mso-style-parent:"";
	font-size:10.0pt;
	font-family:"Times New Roman";
	}
table.MsoTableSimple1
	{border-top:1.5pt solid green;
	border-left:medium none;
	border-bottom:1.5pt solid green;
	border-right:medium none;
	font-size:10.0pt;
	font-family:"Times New Roman";
	}
 li.MsoNormal
	{mso-style-parent:"";
	margin-bottom:.0001pt;
	font-size:12.0pt;
	font-family:"Times New Roman";
	margin-left:0cm; margin-right:0cm; margin-top:0cm}
table.MsoTableList3
	{border-top:1.5pt solid black;
	border-left:medium none;
	border-bottom:1.5pt solid black;
	border-right:medium none;
	font-size:10.0pt;
	font-family:"Times New Roman";
	}
div.Section1
	{page:Section1;}
div.Section2
	{page:Section2;}
-->
</style>
</HEAD>

<BODY leftMargin=0 topMargin=0 marginheight="0" marginwidth="0" style="text-align: center">
<TABLE id=tablageneral height="100%" cellSpacing=0 cellPadding=0 width="1150" border=0>
<TBODY>
     <TR class=noimprimir>
       <TD colSpan=2 height=127 width="1233">
          <TABLE id=cabecera cellSpacing=0 cellPadding=0 width="92%" border=0>
          <TBODY>
             <TR>         
                <TD height=15 width="100%">
                   <TABLE id=menuseccio cellSpacing=0 cellPadding=0 width="100%" border=0>
                   <TBODY>
                      <TR><TD bgColor=#000000>
                        <IMG height=1  src="scss/trans.gif" width=1></TD></TR>
                      <TR><TD bgColor=#000000>
                        <IMG height=1  src="scss/trans.gif" width=1></TD></TR>
                   </TBODY>
                   </TABLE>
                </TD>          
             </TR>
             
             
             <TR>
                <TD height=85 width="100%">
                   <TABLE cellSpacing=0 cellPadding=0 width="99%" border=0>
                   <TBODY>
                   <TR>
                      <TD height=85 width="100%">
                         <TABLE  cellSpacing=0 cellPadding=0 width="102%" border=0 >
                         <TBODY>
                         <TR>
                            <TD width="38%" height="35">
                            <div style="position: absolute; width: 303px; height: 100px; z-index: 1; left: 69px; top: 54px" id="capa1">
								<p style="margin-top: 0; margin-bottom: 0"><b>
								<font size="6" face="Arial">Secci&oacute meteorol&ograve;gica</font></b></p>
								<p style="margin-top: 0; margin-bottom: 0">
								<font size="5" face="Arial">Observatori Fabra</font></div>
                               <p align="center">
                               <img border="0" src="imatges/Ac2.jpg" align="left" width="1140" height="149"></TD>
                         </TR>
                         </TBODY>
                         </TABLE>
                      </TD>
                   </TR>
                   </TBODY>
                   </TABLE>
                </TD>
             </TR>
             
             
             <TR class=noimprimir>
                <TD height=21 width="100%">
                   <TABLE id=menuseccio cellSpacing=0 cellPadding=0 width="100%" border=0>
                   <TBODY>
                   <TR><TD bgColor=#000000>
                     <IMG height=1  src="scss/trans.gif" width=1></TD></TR>
                   <TR><TD bgColor=#000000>
                     <IMG height=1  src="scss/trans.gif" width=1></TD></TR>
                   </TBODY>
                   </TABLE>
                </TD>
             </TR>
                            
                            
             <TR class=noimprimir><TD bgColor=#000000 height=1 width="100%">
               <IMG height=1 src="scss/trans.gif" width=1></TD></TR>
             
             
             <TR class=noimprimir><TD class=menuseccio align=left bgColor=#cccccc height=19 width="100%">
                <TABLE id=menuconceptual height=19 cellSpacing=0 cellPadding=0  width="1148" border=0>
                <TBODY>
                   <TR>
                      <TD width=1 bgColor=#000000>
                      <IMG height=1 src="scss/trans.gif"  width=1></TD>
                      
                      <TD align=middle bgColor=#cccccc  width=160 height=19>
                      <IMG height=8 src="scss/trans.gif" width=10>
                      <a class="menuconceptual" href="/observatori">L'Observatori</a></TD>
                      <TD width=1 bgColor=#000000>
                      <IMG height=1 src="scss/trans.gif"  width=1></TD>
                      
                      <TD align=middle bgColor=#cccccc height=19 width="150">
                      <IMG height=8 src="scss/trans.gif" width=10>
                      <a class="menuconceptual" href="/visites">Visites</a></TD>
                      <TD width=1 bgColor=#000000>
                      <IMG height=1 src="scss/trans.gif"  width=1></TD>
                      
                      <TD align=middle bgColor=#cccccc height=19 width="150">
                      <IMG height=8 src="scss/trans.gif" width=10>
                      <a class="menuconceptual" href="/astro">Astronomia</a></TD>
                      <TD width=1 bgColor=#000000>
                      <IMG height=1 src="scss/trans.gif"  width=1></TD>
                      
                      <TD align=middle bgColor=#cccccc height=19 width="150">
                      <IMG height=8 src="scss/trans.gif" width=10>
                      <a class="menuconceptual" href="/meteo">Meteorologia</a></TD>
                      <TD width=1 bgColor=#000000>
                      <IMG height=1 src="scss/trans.gif"  width=1></TD>
                      
                      <TD align=middle bgColor=#cccccc height=19 width="150">
                      <IMG height=8 src="scss/trans.gif" width=10>
                      <a class="menuconceptual" href="/sismo">Sismologia</a></TD>
                      <TD width=1 bgColor=#000000>
                      <IMG height=1 src="scss/trans.gif"  width=1></TD>
                      
                      <TD align=middle bgColor=#cccccc height=19 width="150">
                      <IMG height=8 src="scss/trans.gif" width=10>
                      <a class="menuconceptual" href="/activitats">Activitats</a></TD>
                      <TD width=1 bgColor=#000000>
                      <IMG height=1 src="scss/trans.gif"  width=1></TD>
                      
                      <TD align=middle bgColor=#cccccc height=19 width="150">
                      <IMG height=8 src="scss/trans.gif" width=10>
                      <a class="menuconceptual" href="/links.html">Enlla&ccedil;os</a></TD>
                      <TD width=1 bgColor=#000000>
                      <IMG height=1 src="scss/trans.gif"  width=1></TD>
                      
                      <TD align=middle bgColor=#cccccc height=19 width="150">
                      <IMG height=8 src="scss/trans.gif" width=10>
                      <a class="menuconceptual" href="/credits.html">Cr&egravedits</a></TD>
                      <TD width=1 bgColor=#000000>
                      <IMG height=1 src="scss/trans.gif"  width=1></TD>
                      
                   </TR>
                 </TBODY>
                 </TABLE>
               </TD>
             </TR>    
        
             <TR><TD bgColor=#000000 height=1 width="100%">
               <IMG height=1 src="scss/trans.gif" width=1></TD></TR>
         </TBODY>
         </TABLE>
       </TD>
     </TR>


     <TR>
       <TD class=noimprimir vAlign=top width=163>
         <TABLE height="100%" cellSpacing=0 cellPadding=0 width=154 bgColor=#f2f2f2 border=0 style="border-collapse: collapse" bordercolor="#111111">
         <TBODY>
           <TR> 
             <TD vAlign=top width=153>
               <TABLE id=menuhome cellSpacing=0 cellPadding=0 width=152 bgColor=#f2f2f2 border=0 height="124">
               <TBODY>
                 <TR><TD height=1 width="152">&nbsp;</TD></TR>
                 <TR>                   
                 <TD class="titulseccioroll"l vAlign=top align=left height="60">
                        <ul>
                          <li><a href="index.html">LA SECCI&oacute</a></li>
                          <br><br>
                          <li><a target="_blank" href="http://www.meteo.cat/mediamb_xemec/AppJava/Mapper.do?ancla=mapa&id=D5&team=ObservacioTeledeteccio&inputSource=SeleccioPerEstacio">TEMPS ACTUAL</a></li>
                          <br><br>
                          <li><a href="resums.html">RESUMS MENSUALS</a></li>
                          <br><br>
                          <li><a href="episodis/episodis.html">EPISODIS</a></li>
                          <br><br>
                          <li>
							<a target="_blank" href="http://www.flickr.com/photos/72073661@N07/">FOTOGRAFIES</li>
                          </a>
                          <br><br>
                          <li><a href="videos/videos.html">VIDEOS</a></li>
                          <br><br>
                          <li><a href="fenologia/fenologia.html">FENOLOGIA</a></li>
                          <br><br>
                          <li><a href="dades/dades.html">DADES CLIM&agraveTIQUES I EFEM&iacute;RIDES</a></li>
                          <br><br>
                          <li><a href="lestacio/lestacio.html">L'ESTACI&oacute</a></li>
                          <br><br>
                          <li><a href="enllacos/enllacos.html">ENLLA&ccedil;OS</a></li>
                        </ul>
                        </a>
                    </TD>
                 </TR>
                 <TR>
                    <TD class=adreca vAlign=top align=middle height="60" width="152">
                        <a target="_blank" href="https://www.facebook.com/fabrameteo">
						<img border="0" src="imatges/logofacebook.jpg" width="57" height="57"></a><BR>
                    </TD>
                 </TR>
                 <TR>
                    <TD class=adreca vAlign=top align=middle height="59" width="152"> 
                      &nbsp;<p>&nbsp;</p>
                      <a href="en_index.html">
                      <img border="0" src="imatges/en.jpg" width="25" height="24"></a><a href="index.html"><img border="0" src="imatges/ca.jpg" width="27" height="24"></a><p>&nbsp;</p>
                    </TD>
                 </TR>
                 <TR>
                    <TD height=3 width="152">
                    <IMG height=1 src="scss/trans.gif" width=1></TD>
                 </TR>
               </TBODY>
               </TABLE>
             </TD>
             <TD width=1 bgColor=#999999>
             <IMG height=1 src="scss/trans.gif" width=1></TD>
           </TR>
         </TBODY>
         </TABLE>
       </TD>
       
       
       <TD vAlign=top align=left width="1070">
         <TABLE id=contenido cellSpacing=0 cellPadding=0 width="982" align=left border=0 height="310">
         <TBODY>
           <TR>
             <TD align=right width=12 rowSpan=4 height="310">
             <IMG height=12 src="scss/trans.gif" width=12></TD>
           </TR>
           <TR>
              <TD vAlign=top width="1000" height="225">
                 <TABLE id=contenhome cellSpacing=0 cellPadding=0 width="960" border=0>
                 <TBODY>
                    <TR>
                                              
                       <TD vAlign=top width="960">
<!-- INICIO TABLA DE COMUNICADOS -->
                          <TABLE class=Path id=comunicats cellSpacing=0 cellPadding=0 width="527" bgColor=#ffffff border=0>
                          <TBODY>

                             <TR><TD bgColor=#ffffff colSpan=3 width="527">
                              
                              </TD></TR>

               
                             <TD bgColor=#fff9f2 width="514">
<!-- INICIO COMUNICADO -->
                             <TABLE class=Path id=comunicatshistoria cellSpacing=0 cellPadding=0 width="100%" border=0>
                             <TBODY>
                             <TR>
                                <TD>
                                   <TABLE id=promoytexto cellSpacing=0 cellPadding=0 width="100%" border=0>
                                   <TBODY>
                                      <TR>
                                         <TD colSpan=3><SPAN class=texnormal>
                                           <TABLE cellSpacing=1 cellPadding=1 width="952" border=0 height="261">
                                           <TBODY class=texnormal>
                                              <TR>
                                                 <TD align=middle height="350" width="948" bgcolor="#EFEFEF">
                                                 <br/>
                                                 <div id="container" style="width:100%; height:500px;"></div>
  <script type="text/javascript">
    $(function() {

        Highcharts.setOptions({
              chart: {
                  backgroundColor: {
                      linearGradient: [0, 0, 500, 500],
                      stops: [
                          [0, 'rgb(255, 255, 255)'],
                          [1, 'rgb(240, 240, 255)']
                          ]
                  },
                  borderWidth: 2,
                  plotBackgroundColor: 'rgba(255, 255, 255, .9)',
                  plotShadow: true,
                  plotBorderWidth: 1
              },
              lang: {
                downloadJPEG: "Baixa en JPEG",
                downloadPDF: "Baixa en PDF",
                downloadPNG: "Baixa en PNG",
                downloadSVG: "Baixa en SVG",
                printChart: "Imprimeix",
            weekdays: ['diumenge', 'dilluns', 'dimarts', 'dimecres', 'dijous', 'divendres', 'dissabte'],
            months: ['gener', 'febrer', 'març', 'abril', 'maig', 'juny', 'juliol', 'agost', 'setembre', 'octubre', 'novembre', 'desembre'],
            shortMonths: [ "gen" , "feb" , "mar" , "abr" , "mai" , "jun" , "jul" , "ago" , "set" , "oct" , "nov" , "des"],
            rangeSelectorFrom: "Des del",
            rangeSelectorTo: "Fins al",
          },
          
          });

                // Create the chart
                $('#container').highcharts('StockChart', {
                   
                    rangeSelector : {
                        //selected : 0
                        enabled: true,
                        inputDateFormat: '%e %b, %Y',
                        buttons: [{
              type: 'month',
              count: 1,
              text: '1m'
            }, {
              type: 'month',
              count: 3,
              text: '3m'
            }, {
              type: 'month',
              count: 6,
              text: '6m'
            },  {
              type: 'year',
              count: 1,
              text: '1 any'
            }, {
              type: 'all',
              text: 'Tot'
            }]
                    },
        
                    title : {
                        text : 'Pluviograma'
                    },

                    yAxis: {
                      labels: {
                        formatter: function() {
                          return this.value + ' mm';
                        }
                      },

                      title: {
                        text: 'Precipitaci\363'
                      },
                    },
                    
                    series : [{
                        name : 'Pluja',
                        //color: "#FF0000",
                        data : [<?php  echo join($dataFinal, ',') ?>],
                        tooltip: {
                            valueDecimals: 3
                        }
                    }]
                });
            });
        

  </script>

                                                 </TD>
																</tr>
															</table>
															</td>
														</tr>
													
													</table>
													
													<table border="0" cellpadding="0" cellspacing="0" height="511" width="850" id="table693">
														<!-- MSTableType="layout" -->
														<tr>
															
														</tr>
														<tr>
															<td valign="top" width="626">
															<!-- MSCellType="ContentBody" -->
															<table cellpadding="0" cellspacing="0" border="0" width="100%" height="100%" id="table694">
																<!-- MSCellFormattingTableID="1" -->
																<tr>
																	<td height="100%" width="100%">
																	<!-- MSCellFormattingType="content" -->
																	<div align="center">
																	<table border="0" width="100%" height="100%" cellpadding="15" cellspacing="0" id="table695">
																		<tr>
																			
																		</tr>
																	</table>
																	</div>
																	</td>
																</tr>
															</table>
															</td>
															<td valign="top" height="465" width="224">
															<!-- MSCellType="NavBody" -->
															
															</td>
														</tr>
													
													</table>
													</span>
													
													
													</table>


													
													</table>

													<p>
                                                 <br>
                                                 <br>
                                                                                        
                                                 </TD>
                                               </TR>
                                            </TBODY>
                                            </TABLE>
                                         </TD>
                                      </TR>
                                   </TBODY>
                                   </TABLE>
                                </TD>
                             </TR>
                             </TBODY>
                             </TABLE>
<!-- FINAL COMUNICADO -->
                             </TD>
                          </TBODY>
                          </TABLE>
<!-- FINAL DE LA TABLA DE COMUNICACIONES -->
                       </TD>
                
                    </TR>
                    
                    
                    
                 </TBODY>
                 </TABLE>
              </TD>
           </TR>
           
           <TR class=noimprimir> 
              <TD align=middle width="1000" height="38"> 
              <table class="direccionlink" cellSpacing="0" cellPadding="0" width="475" align="center" border="0">
                <tr>
                  <td height="10"></td>
                </tr>
                <tr>
                  <td class="Path" vAlign="bottom" align="middle" height="18">
                  <table class="direccionlink" cellSpacing="0" cellPadding="0" width="475" align="center" border="0">
                    <tr>
                      <td class="Path" vAlign="bottom" align="middle" height="18">
                      <table cellSpacing="0" cellPadding="0" border="0">
                        <tr>
                          <td align="middle">
                          <a class="direccionlink" href="/">
                          Home</a></td>
                          <td width="18">
                          <img height="7" src="scss/8792_694_1089709880455_separador_pie.gif" width="18"></td>
                          <td align="middle">
                          <a class="direccionlink" href="/webmap.html">
                          Mapa del web</a></td>
                          <td width="18">
                          <img height="7" src="scss/8792_694_1089709880455_separador_pie.gif" width="18"></td>
                          <td align="middle">
                          <a class="direccionlink" href="/termsofuse.html">
                          Copyright</a></td>
                        </tr>
                      </table>
                      </td>
                    </tr>
                    <tr align="middle">
                      <td class="direccion" height="16">
                      <table class="direccionlink" cellSpacing="0" cellPadding="0" width="475" align="center" border="0">
                        <tr>
                          <td class="direccion" height="16" align="center">© Reial Acadèmia de CIències i Arts de Barcelona· 2007 </td>
                        </tr>
                        <tr align="middle">
                          <td class="direccion" height="16">
                          <img border="0" src="imatges/logo_fabra_mini.jpg" width="35" height="38"></td>
                        </tr>
                      </table>
                      </td>
                    </tr>
                  </table>
                  </td>
                </tr>
                <tr align="middle">
                  <td class="direccion" height="16">Pàgina web creada el Novembre de 2007</td>
                </tr>
              </table>
              </TD>
           </TR>
         </TBODY>
         </TABLE>
       
       </TD>
       
     </TR>
     
     
</TBODY>
</TABLE>
         
</BODY>

</HTML>
