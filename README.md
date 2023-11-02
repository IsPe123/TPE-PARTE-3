# TPE-PARTE-3

MIEMBRO A: Agustin Muzi(42.724.674): agusmuzi79@gmail.com

MIEMBRO B: Pedro Islas (43.907.171): peterislas247@gmail.com

La API Rest es RESTful.
La API Rest maneja de manera adecuada los siguientes códigos de error: (200, 201, 400 y 404).
El servicio que obtiene una colección entera puede ordenarse por cualquiera de los campos de la tabla de manera ascendente o descendente.


//////////////////////////////////////////////////////////////////////////////////////


Debe tener al menos un servicio que liste (GET) una colección entera de entidades:
http://localhost/TPE-PARTE-3/api/productos


//////////////////////////////////////////////////////////////////////////////////////


El servicio que lista una colección entera debe poder ordenarse opcionalmente
por al menos un campo de la tabla, de manera ascendente o descendente(GET):
http://localhost/TPE-PARTE-3/api/productos?order=nombre&sort=asc


//////////////////////////////////////////////////////////////////////////////////////


Debe tener al menos un servicio que obtenga (GET) una entidad determinada por su ID:
http://localhost/TPE-PARTE-3/api/productos/16


//////////////////////////////////////////////////////////////////////////////////////


Debe tener al menos un servicio para agregar y otro para modificar datos (POST y PUT):

POST: http://localhost/TPE-PARTE-3/api/productos
{
    "nombre": "alguno",
    "descripcion": "una descripcion cualquiera",
    "id_categoria": 12
}

PUT: http://localhost/TPE-PARTE-3/api/productos/31
{
    "nombre": "alguno",
    "descripcion": "una descripcion cualquiera",
    "id_categoria": 12
}


//////////////////////////////////////////////////////////////////////////////////////


DELETE por ID:
http://localhost/TPE-PARTE-3/api/productos/31


//////////////////////////////////////////////////////////////////////////////////////


El servicio que obtiene una colección entera puede paginar(GET):
http://localhost/TPE-PARTE-3/api/productos?limit=2&offset=3


//////////////////////////////////////////////////////////////////////////////////////


El servicio que obtiene una colección entera debe poder filtrarse por alguno de sus campos(GET):
http://localhost/TPE-PARTE-3/api/productos?where=id_categoria&type=12


//////////////////////////////////////////////////////////////////////////////////////