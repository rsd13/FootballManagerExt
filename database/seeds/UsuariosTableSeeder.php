<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Equipo;
use App\Usuario;

class UsuariosTableSeeder extends Seeder
{

      public function run()
      {
            DB::table('usuario')->delete();

            $nextDNI = 1;

            $jugador = 0;
            $entrenador = 1;
            $director = 2;
            $admin = 3;

            $PrimerEntrenador = 1;
            $SegundoEntrenador = 2;

            $SinCargo = 0;
            $PrimerCapitan = 1;
            $SegundoCapitan = 2;
            $TercerCapitan = 3;

            $formato = 'Y-m-d H:i:s';

            $admin = new Usuario([
                  'dni' => '00000000A',
                  'nombre' => 'Administrador',
                  'apellidos' => 'Dios',
                  'rol' => 3,
                  'cargo' => null,
                  'posicion' => null,
                  'dorsal' => null,
                  'foto' => '00000000A.png',
                  'fNac' => date($formato,0),
                  'password' => bcrypt('password')
            ]);
            $admin->save();

            $nombres = ["Jose","Manuel","Francisco","Juan","David","Jose Antonio","Jose Luis","Javier","Jesus","Francisco Javier","Carlos","Daniel","Miguel","Rafael","Jose Manuel","Pedro","Alejandro","Angel","Miguel Angel","Jose Maria","Fernando","Luis","Pablo","Sergio","Jorge","Alberto","Juan Carlos","Juan Jose","Ramon","Enrique","Diego","Juan Antonio","Vicente","Alvaro","Raul","Adrian","Joaquin","Ivan","Andres","Oscar","Ruben","Juan Manuel","Santiago","Eduardo","Victor","Roberto","Jaime","Francisco Jose","Ignacio","Alfonso","Salvador","Ricardo","Mario","Jordi","Emilio","Marcos","Julian","Julio","Tomas","Agustin","Guillermo","Gabriel","Jose Miguel","Felix","Jose Ramon","Mohamed","Gonzalo","Joan","Marc","Mariano","Ismael","Domingo","Josep","Cristian","Juan Francisco","Alfredo","Nicolas","Sebastian","Jose Carlos","Felipe","Samuel","Hugo","Martin","Cesar","Aitor","Jose Angel","Jose Ignacio","Gregorio","Victor Manuel","Hector","Luis Miguel","Jose Francisco","Juan Luis","Lorenzo","Albert","Cristobal","Esteban","Xavier","Eugenio","Iker","Rodrigo","Antonio Jose","Alex","Arturo","Borja","Valentin","Jose Javier","Jesus Maria","Juan Miguel","Jaume","Antonio Jesus","German","Lucas","Francisco Manuel","Jonathan","Pedro Jose","Jose Vicente","Adolfo","Isaac","Pau","Benito","Mohammed","Moises","Isidro","Juan Ramon","Abel","Juan Pedro","Ahmed","Bernardo","Ernesto","Christian","Gerardo","Aaron","Manuel Jesus","Sergi","Mikel","Carmelo","Pascual","Iñigo","Federico","Asier","Antonio Manuel","Miquel","Joel","Marcelino","Francesc","Bartolome","Israel","Eric","Mateo","Jon","Eloy","Jesus Manuel","Jose Alberto","Fermin","Luis Alberto","Gerard","Aurelio","Juan Jesus","Omar","Unai","Jonatan","Benjamin","Oriol","Pere","Lluis","Josep Maria","Eusebio","Iñaki","Antoni","Jacinto","Pol","Pedro Antonio","Dario","Victoriano","Carles","Elias","Carlos Alberto","Arnau","Jose Enrique","Marco Antonio","Jeronimo","Angel Luis","Juan Pablo","Matias","Roger","Juan Ignacio","Kevin","Isidoro","Teodoro","Dionisio","Adria","Bruno","Candido","Florencio","Francisco Jesus","Blas","Justo","Roman","Gustavo","Jose Juan","Santos","Juan Bautista","Manuel Angel","Luis Fernando","Armando","Said","Alexander","Damian","Gines","Alonso","Luis Manuel","Emiliano","Izan","Guillem","Carlos Javier","Enric","Faustino","Pedro Luis","Serafin","Ion","Xabier","Gorka","Ander","Ferran","Rachid","Juan Maria","Gheorghe","Marco","Jose Joaquin","Vasile","Ioan","Leonardo","Abraham","Fidel","Jose David","Eduard","Maximo","Ramiro","Saul","Amador","Rogelio","Marti","Claudio","Luciano","Julio Cesar","Luis Maria","Luis Antonio","Jose Andres","Francisco Antonio","Florentino","Jesus Angel","Emilio Jose","Modesto","Youssef","Mustapha","Luis Angel","Simon","Manuel Antonio","Joaquim","Paulino","Ildefonso","Ali","Avelino","Edgar","Aleix","Saturnino","Celestino","Constantino","Yeray","Eladio","Pedro Manuel","Alexandre","Adam","Juan Dios","Jairo","Francisco Miguel","Jose Fernando","Igor","Julen","Rufino","Constantin","Leandro","Juan Vicente","Ezequiel","Jacobo","Eneko","Manuel Jose","Hassan","Carlos Manuel","Robert","Antonio Luis","Andreu","Pedro Maria","Alexis","Antonio Miguel","Juan Andres","Antonio Javier","Jose Daniel","Erik","Oliver","Clemente","Juan Diego","Luis Javier","Feliciano","Gaspar","Jorge Luis","Luis Carlos","Basilio","Hilario","Jan","Pedro Jesus","Cayetano","Raimundo","Marian","Nicolae","Juan Angel","Evaristo","Angel Manuel","Josue","Nestor","Fabian","Marcial","Benigno","Florin","Khalid","Eliseo","Laureano","Marcelo","Francesc Xavier","Manel","Segundo","Narciso","Imanol","Ricard","Cecilio","Abdelkader","Bernardino","Muhammad","Abdellah","Patricio","Juan Alberto","Valeriano","Demetrio","Andoni","Angel Maria","Jesus Antonio","Leopoldo","Michael","Cesareo","Joseba","Fernando Jose","Josu","Luis Enrique","Roberto Carlos","Anastasio","Camilo","Cipriano","Mauricio","Lucio","Pedro Pablo","Hicham","Marcel","Aritz","Abdelaziz","Antonio Francisco","Francisco Luis","Mihai","Brahim","Bienvenido","Rodolfo","Anselmo","Teofilo","Octavio","Iago","Eulogio","Stefan","Baltasar","Yago","Casimiro","Amadeo","Mauro","Bernabe","Ibai","Placido","Alexandru","Pedro Miguel","Pedro Javier","Bernat","Lazaro","Brian","Celso","Fulgencio","Ian","Brais","Nil","Marius","Baldomero","Herminio","Jose Felix","Maximino","Jose Pedro","Carlos Jose","Roque","Hamid","Abderrahim","Dumitru","Paul","Jose Gabriel","Biel","Jesus Miguel","Aquilino","Bonifacio","Manuel Francisco","Francisco Borja","Gumersindo","Luis Francisco","Abdeslam","Manuel Alejandro","Fabio","Anton","Bilal","Jose Rafael","Victorino","Oier","Alan","Ionel","Hipolito","Jose Domingo","Hamza","Eleuterio","Marino","Vidal","Juan Enrique","Didac","Ignasi","Norberto","Francisco Asis","Aimar","Melchor","Driss","Arsenio","Rosendo","Karim","Jesus Javier","Orlando","Juan David","Virgilio","Higinio","Jorge Juan","Adan","Ayoub","Luis Alfonso","Markel","Alberto Jose","Severino","Vicente Jose","Urbano","Pablo Jose","Mamadou","Peter","Jamal","Victor Jose","Carlos Enrique","Juan Fernando","Augusto","Anibal","Jose Pablo","Juan Gabriel","Ceferino","Noel","Venancio","Viorel","Antonio Maria","Pelayo","Alain","Inocencio","Jose Alejandro","Bautista","Jose Tomas","John","Aziz","Jose Jesus","Abelardo","Maximiliano","Marcos Antonio","Carlos Antonio","Primitivo","Gustavo Adolfo","Jose Alfonso","Jose Emilio","Vicent","Ibrahim","Denis","Ibon","Isaias","Jose Eduardo","Genaro","Luis Eduardo","Miguel Antonio","Eduardo Jose","Samir","Agapito","Pedro Angel","Richard","Nemesio","Yassine","Jose Benito","Jorge Manuel","Pedro Juan","Francisco Ramon","Leoncio","Prudencio","Braulio","Gaizka","Iban","Eloi","Secundino","Angel Jose","Moussa","Jose Julian","Conrado","Antonio David","Manuel Maria","Victor Hugo","Noureddine","Enrique Jose","Delfin","Beñat","Mimoun","Jose Raul","Alejandro Jose","Jesus Alberto","Fausto","Jose Agustin","Jose Ricardo","Luis Felipe","Nabil","Mohammad","Juan Rafael","Ovidio","Alejo","Ambrosio","Adil","Aniceto","Indalecio","Gabino","Agusti","Juan Cruz","Jorge Antonio","Luca","Ionut","Fernando Javier","Carlos Andres","Noe","Arkaitz","George","Humberto","Angel Antonio","Andrei","Jon Ander","Carlos Jesus","Diego Jose","Sabino","Luis Jose","Heliodoro","Anas","Jose Julio","Desiderio","Silvestre","Cesar Augusto","Nicanor","Ismail","Endika","Mostafa","Thomas","Lino","Esteve","Sixto","Severiano","Petru","Honorio","Carlos Miguel","Hermenegildo","Julio Alberto","Horacio","Estanislao","Lander","Antonio Angel","Abdellatif","Florian","Pablo Antonio","Pedro Francisco","Antolin","Zakaria","Benedicto","Rayan","Ruben Dario","Antonio Ramon","Eustaquio","Damaso","Ventura"];
            $apellidos = ["Garcia","Gonzalez","Rodriguez","Fernandez","Lopez","Martinez","Sanchez","Perez","Gomez","Martin","Jimenez","Ruiz","Hernandez","Diaz","Moreno","Alvarez","Muñoz","Romero","Alonso","Gutierrez","Navarro","Torres","Dominguez","Vazquez","Ramos","Gil","Ramirez","Serrano","Blanco","Suarez","Molina","Morales","Ortega","Delgado","Castro","Ortiz","Rubio","Marin","Sanz","Nuñez","Iglesias","Medina","Garrido","Santos","Castillo","Cortes","Lozano","Guerrero","Cano","Prieto","Mendez","Calvo","Cruz","Gallego","Vidal","Leon","Herrera","Marquez","Peña","Cabrera","Flores","Campos","Vega","Diez","Fuentes","Carrasco","Caballero","Nieto","Reyes","Aguilar","Pascual","Herrero","Santana","Lorenzo","Hidalgo","Montero","Ibañez","Gimenez","Ferrer","Duran","Vicente","Benitez","Mora","Santiago","Arias","Vargas","Carmona","Crespo","Roman","Pastor","Soto","Saez","Velasco","Soler","Moya","Esteban","Parra","Bravo","Gallardo","Rojas","Pardo","Merino","Franco","Espinosa","Izquierdo","Lara","Rivas","Silva","Rivera","Casado","Arroyo","Redondo","Camacho","Rey","Vera","Otero","Luque","Galan","Montes","Rios","Sierra","Segura","Carrillo","Marcos","Marti","Soriano","Mendoza","Robles","Bernal","Vila","Valero","Palacios","Exposito","Benito","Andres","Varela","Pereira","Macias","Guerra","Heredia","Bueno","Roldan","Mateo","Villar","Contreras","Miranda","Guillen","Mateos","Escudero","Aguilera","Menendez","Casas","Aparicio","Rivero","Estevez","Beltran","Padilla","Gracia","Rico","Calderon","Abad","Galvez","Conde","Salas","Jurado","Quintana","Plaza","Acosta","Aranda","Blazquez","Roca","Bermudez","Costa","Miguel","Santamaria","Salazar","Guzman","Serra","Villanueva","Cuesta","Manzano","Tomas","Hurtado","Trujillo","Rueda","Pacheco","Avila","Simon","De La Fuente","Pons","Lazaro","Sancho","Mesa","Del Rio","Escobar","Millan","Blasco","Alarcon","Luna","Castaño","Zamora","Salvador","Bermejo","Paredes","Anton","Ballesteros","Valverde","Maldonado","Bautista","Valle","Ponce","Rodrigo","Lorente","Oliva","Juan","Cordero","Mas","Collado","Murillo","Pozo","De La Cruz","Cuenca","Montoya","Martos","Cuevas","Marco","Barroso","Ros","Quesada","De La Torre","Barrera","Ordoñez","Gimeno","Corral","Alba","Puig","Cabello","Pulido","Rojo","Navas","Saiz","Soria","Arenas","Aguado","Domingo","Galindo","Vallejo","Mena","Escribano","Asensio","Ramon","Valencia","Lucas","Caro","Polo","Aguirre","Naranjo","Mata","Villalba","Reina","Paz","Amador","Moran","Linares","Ojeda","Leal","Burgos","Chen","Oliver","Carretero","Bonilla","Sosa","Roig","Aragon","Carrion","Clemente","Villa","Castellano","Carrera","Hernando","Cordoba","Rosa","Andreu","Caceres","Calero","Correa","Mohamed","Cobo","Cardenas","Ferreira","Alcaraz","Juarez","Velazquez","Domenech","Sola","Chacon","Riera","Saavedra","Toledo","Llorente","Zapata","Moral","Vela","Salgado","Carbonell","Villegas","Arribas","Prado","Alfonso","Requena","Ayala","Pelaez","Sevilla","Font","Barrios","Luis","Carballo","Piñeiro","Olivares","Esteve","Marques","Da Silva","Solis","Pinto","Camara","Grau","Quintero","Salinas","Bosch","Perea","Pineda","Cid","Marrero","Ballester","Cantero","Castilla","Sanchis","De La Rosa","Palomo","Arevalo","Casanova","Miralles","Sala","Rincon","Nicolas","Lago","Baena","Herranz","Porras","Belmonte","Cardona","Palma","Recio","Arranz","Muñiz","Pino","Barba","Ventura","Barreiro","Coll","Cabezas","Cobos","Cuadrado","Angulo","Cervera","Velez","Madrid","Puente","Vaquero","Ochoa","Navarrete","Becerra","Pujol","Ocaña","Tapia","Singh","Granados","Bello","Valls","Alfaro","Vergara","Latorre","Peralta","Losada","Gamez","Mejias","Campo","Rovira","Sastre","Corrales","Egea","Castellanos","Falcon","Barragan","Alcantara","Estrada","Catalan","Fraile","Cebrian","Godoy","Cerezo","Segovia","Huertas","Ferreiro","Borrego","Sole","Ruano","Aznar","Barbero","Morcillo","Duarte","Valenzuela","Guijarro","Arjona","Del Valle","Toro","Pavon","Carvajal","Fajardo","Peinado","Ariza","Canovas","Jorge","Sainz","Alcaide","Romera","Melero","Agudo","Morillo","Royo","Barrio","Gordillo","Llamas","Tejero","Real","Gonzalo","Rosales","Galvan","Portillo","Espejo","Lobato","Valdes","Tirado","Duque","Criado","Freire","Davila","Dos Santos","Chamorro","Dorado","Grande","Frias","Moyano","Calleja","Pizarro","Zambrano","Huerta","Mosquera","Pla","Figueroa","Solano","Olmedo","Rosado","De Miguel","Alcazar","Pena","Tena","Alcalde","Saenz","Ferrero","Alcala","Paniagua","Aviles","Vives","Lafuente","Pazos","Del Pozo","Llorens","Heras","Noguera","Bonet","Rebollo","Garzon","Chaves","Araujo","Amaya","Bartolome","Salcedo","Serna","Brito","Mateu","Poveda","Valles","Paez","Arce","Salguero","Olmo","Piñero","Andrade","Hervas","Barranco","Abellan","Haro","Cabeza","Quiros","Souto","Giner","Valiente","Borras","Llopis","Lin","Bilbao","Yañez","Afonso","Garces","Barcelo","Fuertes","Mira","Palomino","Mellado","Alvarado","Ribas","Laguna","Calle","Palomares","Osorio","Molero","Carreño","Orozco","Castello","Osuna","Del Castillo","Borja","Wang","Maestre","San Jose","Castañeda","Prats","Montesinos","Ahmed","Ceballos","Minguez","Zafra","Del Pino","Puertas","Felipe","Baeza","Vilchez","Carreras","Bellido","Gascon","Olmos","Pareja","Sebastian","Leiva","Vizcaino","Urbano","Luengo","Perales","Peris","Jaen","Chavez","Zaragoza","Bustamante","Murcia","Montoro","Gago","Arcos","Campillo","Alegre","Moreira","Casal","Tejada","Enriquez","De Castro","Cañas","Baños","Valera","Monge","Fuster","Acevedo","Vilar","Ledesma","Nadal","Sanjuan","Tejedor","Bustos","Sobrino","Seoane","Tello","Ferre","Cazorla","Rocha","Pallares","Salmeron","Sarmiento","Zabala","Armas","Verdu","Jerez","Conesa","Ripoll","Mari","Ferrando","Jara","Veiga","Orellana","Vasquez","Jordan","Fraga","Moro","Mayor","Catala","Montiel","Barea","Climent","Tortosa","Arteaga","Barrero","Taboada","San Martin","Del Campo","Sandoval","Baez","Lobo","Almeida","Bejarano","Ayuso","Prada","Amoros","Padron","Dieguez","De Leon","Prados","Abril","Tamayo","Patiño","Moron","Alvaro","Barros","Zhang","Batista","Maya","Peñalver","Manso","Infante","Aleman","Cerda","Yuste","Galera","Maroto","Ribera","Alves","Albert","Berenguer","Nogales","Machado","Miro","Miguez","Pinilla","Manrique","Echeverria","Pedrosa","Mota","Villaverde","Viñas","Atienza","Diego","Jaramillo","Del Olmo","Sampedro","Canales","Lucena","Villena","Dueñas","Teruel","Novoa","Cifuentes","Medrano","Echevarria","Raya","Manzanares","Ortuño","Sevillano","Ubeda","Almagro","Ares","Checa","Lujan","Robledo","Merchan","Francisco","Trigo","Frances","Acedo","De Las Heras","Perdomo","Mejia","Hermida","Segarra","Macia","Herreros","Iniesta","Morillas","De Diego","Torre","Quevedo","Caparros","Bolaños","España","Puerto","Balaguer","Rodrigues","Montaño","Prat","Espada","Matas","Zamorano","Granado","Ibarra","Talavera","Puerta","Bernabe","Giraldo","Barbera","Mayo","Mariño","Ye","Pina","Tellez","Peral","Cubero","Coronado","Toribio","Tome","Bernabeu","Lamas","Monzon","Badia","Peiro","Sanmartin","Palacio","Montilla","Molinero","Carro","Buendia","Encinas","Lloret","Arana","Martorell","Boix","Melian","Xu","Saura","Rodenas","Camps","Parrilla","Costas","Vivas","Cervantes","Mayoral","Valdivia","Fidalgo","Coca","Fariña","Cuellar","Hinojosa","Mariscal","Melendez","Piqueras","Acuña","Quiles","Cañete","Pedraza","Planas","Tovar","Mir","Revuelta","Narvaez","Zurita","Sepulveda","De Los Santos","Li","Sales","Lema","Carrero","Goñi","Fuente","Picazo","Gamero","Parada","Diallo","Ureña","Rial","Cañadas","Frutos","Palau","Cespedes","Mestre","Pico","Sabater","Andujar","Gordo","Torregrosa","Solana","Giron","Codina","Arnau","Quiroga","Alamo","Perera","Novo","Romo","Amor","Arellano","Carrascosa","Mera","Guisado","Segui","Oliveira","Botella","Viera","Rus","Adan","Riquelme","Pop","Vilches","Antolin","Amores","Calatayud","Ribes","Espinoza","Wu","Farre","Vegas","Revilla","De Dios","Pellicer","Nevado","Chico","Toledano","Herraiz","Liu","Hermoso","Parejo","Caamaño","Labrador","Ramiro","Jimeno","Neira","Palazon","Zhou","Jaime","Sousa","Benavides","Cantos","Quero","Vaca","Lora","Alemany","Torralba","Nieves","Silvestre","Yague","Antunez","Sempere","Belda","Elvira","Centeno","Del Moral","Vico","Comas","Rosell","Fonseca","Cordon","Verdugo","Sacristan","Popa","Florez","Guardiola","Mansilla","Colomer","Guirado","Capdevila","Postigo","Guevara","Hoyos","Canto","Montenegro","Galiano","Uriarte","Rio","Rosello","Feijoo","Sans","Arnaiz","Megias","Berrocal","Cañizares","Perello","Cabanillas","Llanos","Figueras","Piña","Gisbert","Cristobal","Gomes","Espin","Trillo","Maza","Gilabert","Aroca","Aliaga","Portela","Monteagudo","Cerdan","Cornejo","Garriga","Mañas","San Juan","Chaparro","Tudela","Seco","Smith","Campoy","Quiñones","Amado","Gabarri","Reig","Meseguer","Amat","Julian","Torrejon","Morilla","Carpio","Ali","Tejera","Camino","Holgado","Olivera","Martins","Carranza","Lima","Castells","Muriel","Oviedo","Mercado","San Miguel","Matos","Bastida","Valcarcel","Marmol","Espino","Plasencia","Saldaña","Gaspar","Morera","Barrientos","Nogueira","Julia","Betancor","Samper","Casals","Cardoso","Guirao","Paris","Abreu","Lillo","Melgar","Gavilan","Barbosa","Benavente","Morato","Florido","Pereda","Dorta","Jorda","Ruz","Ugarte","Gomis","Ferrera","Tur","Ivanov","Chica","Calzada","Pueyo","De Haro","Casares","Cueto","Valderrama","Bernardo","Fernandes","Elias","Conejo","Higueras","Jover","Vara","Montalvo","Larrea","Anaya","De La Iglesia","Reche","Pajares","Urrutia","Merida","Mato","Verdejo","Ferreras","Casero","Rius","De La Peña","Coello","Cabrero","Deniz","Llorca","Salamanca","Gallo","Daza","Lorca","Cerro","Del Amo","Simo","Agullo","Casanovas","Arrieta","Candela","Pages","Asenjo","Ropero","Palomar","Maestro","Aragones","Matias","Benavent","Bayon","Briones","Esparza","Monje","Albaladejo","Vilanova","Ferrandez","Torrado","Puga","Garmendia","Espinar","Cabo","Corbacho","Sabate","Iriarte","Zhu","Quintanilla","Barreto","Hierro","Martel","Vadillo","Zuñiga","Pintado","Garay","De La Vega","Bou","Guardia","Barriga","Escalante","Capilla","Salido","Ayllon","Rama","Montalban","Tormo","Donoso","Larrañaga","Pita","Blas","Torrent","Madrigal","Poza","Molla","Miquel","Val","Villalobos","Anguita","Piñol","De La Calle","Mancebo","Monreal","Milan","Busto","Carpintero","Porcel","De Pablo","Portero","Mediavilla","Triviño","Amigo","Gregorio","Zheng","Sanabria","Radu","Buitrago","Porta","Meneses","Paya","Dalmau","De Andres","Valentin","Zorrilla","Donaire","Castillejo","Cuervo","Blanch","Giraldez","Granda","Picon","Company","Angel","Garrote","Rabadan","Cadenas","Antequera","Cortijo","Alberdi","Cascales","Sarabia","Miguelez","De Jesus","Roda","Cañada","Gines","Albarran","Escriva","Montesdeoca","Gea","Noriega","Clavijo","Ivanova","Cisneros","Parraga","Montañes","Barahona","Carbajo","Lluch","Pelayo","Terron","Aguiar","Ndiaye","Reguera","Roncero","Justo","Jodar","Mico","Bertran","De Frutos","Pozuelo","Teixeira","Maria","Almansa","Berlanga","Aguera","Bayo","Palmero","Regueiro","Moldovan","Siles","Porto","Puche","Gabarre","Raposo","Abella","Priego","Arcas","Muro","Velasquez","De Oliveira","Peñas","Querol","Moraleda","Morante","Valladares","Triguero","Plana","Tenorio","Castrillo","Carracedo","Cepeda","Morgado","Carbo","Zambrana","Cabañas","Maqueda","Vacas","Granero","Panadero","Morell","Ribeiro","Monroy","Milla","Infantes","Gazquez","Diop","Utrera","Fortes","Sedano","Manjon","Macho","Castejon","Vilas","Almazan","Dura","Concepcion","Loureiro","Pomares","Moliner","Caravaca","Arregui","Rocamora","Castell","Arguelles","Kaur","Plata","Canton","Tornero","De Paz","Villarreal","Roa","Mulero","Baron","Pradas","Alcon","Sotelo","Dumitru","Caraballo","Barco","Escalona","Tebar","Cerrato","Rosillo","Asencio","Amaro","Bazan","Machin","Gandia","Uribe","Miras","Sendra","Riveiro","Campaña","Canal","Cuartero","Canals","Fabregat","Iñiguez","Aguayo","Calzado","Torrijos","Jauregui","Armengol","Conejero","Bolivar","Vigo","Lledo","Coronel","Quintas","De Pedro","Felix","Henriquez","Vilariño","Romano","Nicolau","Ramis","Colom","Trinidad","Mangas","Alsina","Teran","Venegas","Antelo","Miron","Cutillas","Parras","Abascal","Yang","Pedrero","Escamilla","Oller","Mengual","Cozar","Artiles","Carnero","Del Barrio","Pablo","Nebot","Salvatierra","Rosas","Huguet","Morata","Fontan","Seijas","Torrente","Barrena","Aguila","Monfort","Roque","Diz","Camarero","Galiana","Llano","Pablos","Casillas","Quilez","Landa","Ferri","Ferro","Busquets","Orts","Lahoz","Aramburu","Uceda","Bejar","Posada","Torrecillas","Abadia","Cases","Gonzales","Brea","Barcia","Parrado","Pantoja","Devesa","Arnal","Graña","Varo","Niño","Yanes","San Roman","Orta","Viejo","Lavado","Vicent","Rua","Couto","Pan","Romeo","Cayuela","Torrecilla","Valbuena","Vieira","Laso","Gonzalvez","Iborra","Reinoso","Amo","Viana","Marina","Da Costa","Alcolea","Rossello","Ferrandiz","Higuera","Lastra","Pereiro","Vendrell","Duro","Mendizabal","Mendes","Masip","Matamoros","Barrionuevo","Andrades","Torrico","Constantin","Bas","Stoica","Liebana","Moll","Alguacil","Mugica","Funes","Lage","Baquero","Artigas","Nuño","Blanes","Samaniego","Borges","Iranzo","Motos","Toscano","Jones","Borrero","Carreira","Rozas","Gadea","Barral","Simarro","Arrabal","Stan","Del Rey","Mihai","Matilla","Acero","Feliu","Vivancos","Selles","De Juan","Canet","Huang","Ortigosa","Parreño","Regalado","Llinares","Navalon","Cortina","Curbelo","Yepes"];
            $equipos = Equipo::get();
            $libre = Equipo::where('nombreEquipo','like','%Libre%')->first();
            foreach ($equipos as $equipo) {
                  if($equipo->id != $libre->id){
                        $posiciones = [1,1,1,2,2,2,2,2,2,2,2,2,3,3,3,3,3,3,3,3,3,3,4,4,4,4,4,4];
                        //Director
                        $dni = (string)$nextDNI++;
                        while(strlen($dni)<8){
                              $dni = "0".$dni;
                        }
                        $dni = $dni.chr(mt_rand(65, 90));
                        $user = new Usuario([
                              'dni'=> $dni,
                              'nombre' => $nombres[mt_rand(0, 601)],
                              'apellidos' => $apellidos[mt_rand(0, 1413)]." ".$apellidos[mt_rand(0, 1413)],
                              'fNac' =>  date($formato,mt_rand(strtotime('1970-01-01'), strtotime('1977-12-31'))),
                              'salario' => mt_rand(5000, 100000),
                              'rol' => $director,
                              'cargo' => null,
                              'posicion' => null,
                              'dorsal' => null,
                              'foto' => $dni.'.png',
                              'password' => bcrypt('password'),
                              'equipo_id' => $equipo->id
                        ]);
                        $user->save();

                        //PrimerEntrenador
                        $dni = (string)$nextDNI++;
                        while(strlen($dni)<8){
                              $dni = "0".$dni;
                        }
                        $dni = $dni.chr(mt_rand(65, 90));
                        $user = new Usuario([
                              'dni'=> $dni,
                              'nombre' => $nombres[mt_rand(0, 601)],
                              'apellidos' => $apellidos[mt_rand(0, 1413)]." ".$apellidos[mt_rand(0, 1413)],
                              'fNac' =>  date($formato,mt_rand(strtotime('1977-01-01'), strtotime('1992-12-31'))),
                              'equipo_id' => $equipo->id,
                              'salario' => mt_rand(5000, 100000),
                              'rol' => $entrenador,
                              'cargo' => $PrimerEntrenador,
                              'posicion' => null,
                              'dorsal' => null,
                              'foto' => $dni.'.png',
                              'password' => bcrypt('password')
                        ]);
                        $user->save();

                        //SegundoEntrenador
                        $dni = (string)$nextDNI++;
                        while(strlen($dni)<8){
                              $dni = "0".$dni;
                        }
                        $dni = $dni.chr(mt_rand(65, 90));
                        $user = new Usuario([
                              'dni'=> $dni,
                              'nombre' => $nombres[mt_rand(0, 601)],
                              'apellidos' => $apellidos[mt_rand(0, 1413)]." ".$apellidos[mt_rand(0, 1413)],
                              'fNac' =>  date($formato,mt_rand(strtotime('1977-01-01'), strtotime('1992-12-31'))),
                              'equipo_id' => $equipo->id,
                              'salario' => mt_rand(5000, 100000),
                              'rol' => $entrenador,
                              'cargo' => $SegundoEntrenador,
                              'posicion' => null,
                              'dorsal' => null,
                              'foto' => $dni.'.png',
                              'password' => bcrypt('password')
                        ]);
                        $user->save();

                        //Jugadores
                        $i = 0;

                        //PrimerCapitan
                        $posicion = mt_rand(0,count($posiciones)-1);
                        $dni = (string)$nextDNI++;
                        while(strlen($dni)<8){
                              $dni = "0".$dni;
                        }
                        $dni = $dni.chr(mt_rand(65, 90));
                        $user = new Usuario([
                              'dni'=> $dni,
                              'nombre' => $nombres[mt_rand(0, 601)],
                              'apellidos' => $apellidos[mt_rand(0, 1413)]." ".$apellidos[mt_rand(0, 1413)],
                              'fNac' =>  date($formato,mt_rand(strtotime('1985-01-01'), strtotime('2000-12-31'))),
                              'equipo_id' => $equipo->id,
                              'salario' => mt_rand(5000, 100000),
                              'rol' => $jugador,
                              'cargo' => $PrimerCapitan,
                              'posicion' => $posiciones[$posicion],
                              'dorsal' => 1+$i++,
                              'foto' => $dni.'.png',
                              'password' => bcrypt('password')
                        ]);
                        $user->save();
                        array_splice($posiciones,$posicion,1);


                        //SegundoCapitan
                        $dni = (string)$nextDNI++;
                        $posicion = mt_rand(0,count($posiciones)-1);
                        while(strlen($dni)<8){
                              $dni = "0".$dni;
                        }
                        $dni = $dni.chr(mt_rand(65, 90));
                        $user = new Usuario([
                              'dni'=> $dni,
                              'nombre' => $nombres[mt_rand(0, 601)],
                              'apellidos' => $apellidos[mt_rand(0, 1413)]." ".$apellidos[mt_rand(0, 1413)],
                              'fNac' =>  date($formato,mt_rand(strtotime('1985-01-01'), strtotime('2000-12-31'))),
                              'equipo_id' => $equipo->id,
                              'salario' => mt_rand(5000, 100000),
                              'rol' => $jugador,
                              'cargo' => $SegundoCapitan,
                              'posicion' => $posiciones[$posicion],
                              'dorsal' => 1+$i++,
                              'foto' => $dni.'.png',
                              'password' => bcrypt('password')
                        ]);
                        $user->save();
                        array_splice($posiciones,$posicion,1);


                        //TercerCapitan
                        $dni = (string)$nextDNI++;
                        while(strlen($dni)<8){
                              $dni = "0".$dni;
                        }
                        $dni = $dni.chr(mt_rand(65, 90));
                        $posicion = mt_rand(0,count($posiciones)-1);
                        $user = new Usuario([
                              'dni'=> $dni,
                              'nombre' => $nombres[mt_rand(0, 601)],
                              'apellidos' => $apellidos[mt_rand(0, 1413)]." ".$apellidos[mt_rand(0, 1413)],
                              'fNac' =>  date($formato,mt_rand(strtotime('1985-01-01'), strtotime('2000-12-31'))),
                              'equipo_id' => $equipo->id,
                              'salario' => mt_rand(5000, 100000),
                              'rol' => $jugador,
                              'cargo' => $TercerCapitan,
                              'posicion' => $posiciones[$posicion],
                              'dorsal' => 1+$i++,
                              'foto' => $dni.'.png',
                              'password' => bcrypt('password')
                        ]);
                        $user->save();
                        array_splice($posiciones,$posicion,1);


                        //Resto de jugadores
                        for(; $i<24 ; $i++){
                              $dni = (string)$nextDNI++;
                              while(strlen($dni)<8){
                                    $dni = "0".$dni;
                              }
                              $dni = $dni.chr(mt_rand(65, 90));
                              $posicion = mt_rand(0,count($posiciones)-1);
                              $user = new Usuario([
                                    'dni'=> $dni,
                                    'nombre' => $nombres[mt_rand(0, 601)],
                                    'apellidos' => $apellidos[mt_rand(0, 1413)]." ".$apellidos[mt_rand(0, 1413)],
                                    'fNac' =>  date($formato,mt_rand(strtotime('1985-01-01'), strtotime('2000-12-31'))),
                                    'equipo_id' => $equipo->id,
                                    'salario' => mt_rand(5000, 100000),
                                    'rol' => $jugador,
                                    'cargo' => $SinCargo,
                                    'posicion' => $posiciones[$posicion],
                                    'dorsal' => $i+1,
                                    'foto' => $dni.'.png',
                                    'password' => bcrypt('password')
                              ]);
                              $user->save();
                              array_splice($posiciones,$posicion,1);
                        }
                  }
            }
      }
}
