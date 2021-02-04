
        window.onload = function () {
            // Variables
            let baseDeDatos = [
                {
                    id: 1,
                    nombre1: 'Boleto para destino',
                    nombre: 'Pedro Carbo',
                    nombre2: 'Nombre de la cooperativa',
                    cooperativa: 'Pedro Carbo',
                    precio: 2 ,
                    tiempo: 'Tiempo viaje: 1h 30 min',
                    imagen: 'Pedro_carbo.jpg'
                },
                {
                    id: 2,
                    nombre1: 'Boleto para destino',
                    nombre: 'Pedro Carbo',
                    nombre2: 'Nombre de la cooperativa',
                    cooperativa: 'Piedad',
                    precio: 2,
                    tiempo: 'Tiempo viaje: 1h 30 min',
                    imagen: 'PedroCarbo2.0.jpg'
                },
                {
                    id: 3,
                    nombre1: 'Boleto para destino',
                    nombre: 'Pajan',
                    nombre2: 'Nombre de la cooperativa',
                    cooperativa: 'Pajan',
                    precio: 4,
                    tiempo: 'Tiempo viaje: 3h 40 min',
                    imagen: 'pajan.jpg'
                }

            ];
            
            let $items = document.querySelector('#items');
            let carrito = [];
            let total = 0;
            let $carrito = document.querySelector('#carrito');
            let $total = document.querySelector('#total');
            let $botonVaciar = document.querySelector('#boton-vaciar');

            // Funciones
            function renderItems() {
                for (let info of baseDeDatos) {
                    // Estructura
                    let miNodo = document.createElement('div');
                    miNodo.classList.add('card', 'col-sm-4');
                    // Body
                    let miNodoCardBody = document.createElement('div');
                    miNodoCardBody.classList.add('card-body');
                    // Nombre1
                    let miNodoTitle1 = document.createElement('h5');
                    miNodoTitle1.classList.add('card-title');
                    miNodoTitle1.textContent = info['nombre1'];
                    // Titulo
                    let miNodoTitle = document.createElement('h5');
                    miNodoTitle.classList.add('card-title');
                    miNodoTitle.textContent = info['nombre'];
                    // Nombre2
                    let miNodoTitle2 = document.createElement('h5');
                    miNodoTitle2.classList.add('card-title');
                    miNodoTitle2.textContent = info['nombre2'];
                    // Cooperativa
                    let miNodoCooperativa = document.createElement('h5');
                    miNodoCooperativa.classList.add('card-title');
                    miNodoCooperativa.textContent = info['cooperativa'];
                    // Titulo
                    let miNodotiempo = document.createElement('h5');
                    miNodotiempo.classList.add('card-title');
                    miNodotiempo.textContent = info['tiempo'];
                    // Imagen
                    let miNodoImagen = document.createElement('img');
                    miNodoImagen.classList.add('img-fluid');
                    miNodoImagen.setAttribute('src', info['imagen']);
                    // Precio
                    let miNodoPrecio = document.createElement('p');
                    miNodoPrecio.classList.add('card-text');
                    miNodoPrecio.textContent = info['precio']+ " $";
                    // Boton 
                    let miNodoBoton = document.createElement('button');
                    miNodoBoton.classList.add('btn' , 'btn-primary');
                    miNodoBoton.textContent = 'Buy Now';
                    miNodoBoton.setAttribute('marcador', info['id']);
                    miNodoBoton.addEventListener('click', anyadirCarrito);
                    // Insertamos
                    miNodoCardBody.appendChild(miNodoTitle1);
                    miNodoCardBody.appendChild(miNodoTitle);
                    miNodoCardBody.appendChild(miNodoTitle2);
                    miNodoCardBody.appendChild(miNodoCooperativa);
                    miNodoCardBody.appendChild(miNodoImagen);
                    miNodoCardBody.appendChild(miNodoPrecio);
                    miNodoCardBody.appendChild(miNodotiempo);
                    miNodoCardBody.appendChild(miNodoBoton); 
                
                    miNodo.appendChild(miNodoCardBody);
                    $items.appendChild(miNodo);
                }
            }

            function anyadirCarrito () {
                // Anyadimos el Nodo a nuestro carrito
                carrito.push(this.getAttribute('marcador'))
                // Calculo el total
                calcularTotal();
                // Renderizamos el carrito 
                renderizarCarrito();
            }

            function renderizarCarrito() {
                // Vaciamos todo el html
                $carrito.textContent = '';
                // Quitamos los duplicados
                let carritoSinDuplicados = [...new Set(carrito)];
                // Generamos los Nodos a partir de carrito
                carritoSinDuplicados.forEach(function (item, indice) {
                    // Obtenemos el item que necesitamos de la variable base de datos
                    let miItem = baseDeDatos.filter(function(itemBaseDatos) {
                        return itemBaseDatos['id'] == item;
                    });
                    // Cuenta el número de veces que se repite el producto
                    let numeroUnidadesItem = carrito.reduce(function (total, itemId) {
                        return itemId === item ? total += 1 : total;
                    }, 0);
                    // Creamos el nodo del item del carrito
                    let miNodo = document.createElement('li');
                    miNodo.classList.add('list-group-item', 'text-right', 'mx-2');
                    miNodo.textContent = `${numeroUnidadesItem} x ${miItem[0]['nombre']} - ${miItem[0]['precio']}$`;
                    // Boton de borrar
                    let miBoton = document.createElement('button');
                    miBoton.classList.add('btn', 'btn-danger', 'mx-5');
                    miBoton.textContent = 'X';
                    miBoton.style.marginLeft = '1rem';
                    miBoton.setAttribute('item', item);
                    miBoton.addEventListener('click', borrarItemCarrito);
                    // Mezclamos nodos
                    miNodo.appendChild(miBoton);
                    $carrito.appendChild(miNodo);
                });
            }

            function borrarItemCarrito() {
                // Obtenemos el producto ID que hay en el boton pulsado
                let id = this.getAttribute('item');
                // Borramos todos los productos
                carrito = carrito.filter(function (carritoId) {
                    return carritoId !== id;
                });
                // volvemos a renderizar
                renderizarCarrito();
                // Calculamos de nuevo el precio
                calcularTotal();
            }

            function calcularTotal() {
                // Limpiamos precio anterior
                total = 0;
                // Recorremos el array del carrito
                for (let item of carrito) {
                    // De cada elemento obtenemos su precio
                    let miItem = baseDeDatos.filter(function(itemBaseDatos) {
                        return itemBaseDatos['id'] == item;
                    });
                    total = total + miItem[0]['precio'];
                }
                // Formateamos el total para que solo tenga dos decimales
                let totalDosDecimales = total.toFixed(2);
                // Renderizamos el precio en el HTML
                $total.textContent = totalDosDecimales;
            }

            function vaciarCarrito() {
                // Limpiamos los productos guardados
                carrito = [];
                // Renderizamos los cambios
                renderizarCarrito();
                calcularTotal();
            }

            // Eventos
            $botonVaciar.addEventListener('click', vaciarCarrito);

            // Inicio
            renderItems();
        } 