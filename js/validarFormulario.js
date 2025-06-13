document.addEventListener('DOMContentLoaded', () => {
    const formulario = document.querySelector('form');
    if (!formulario) return;

    const skuInput = formulario.querySelector('input[name="sku"]');
    const nombreInput = formulario.querySelector('input[name="nombre"]');
    const cantidadInput = formulario.querySelector('input[name="cantidad"]');
    const precioInput = formulario.querySelector('input[name="precio"]');

    const idInput = formulario.querySelector('input[name="idProducto"]');
    const id = idInput ? idInput.value.trim() : '';

    const inputs = [skuInput, nombreInput, cantidadInput, precioInput];
    let skuValido = id ? true : false;

    if (skuInput) {
        skuInput.addEventListener('input', () => {
            const sku = skuInput.value.trim();

            if (sku === '') return;

            fetch(`validarSku.php?sku=${encodeURIComponent(sku)}${id ? `&id=${id}` : ''}`)
                .then(res => res.text())
                .then(data => {
                    if (data === 'existe') {
                        setInvalid(skuInput, 'Ya existe un producto con el código SKU ingresado');
                        skuValido = false;
                    } else {
                        setValid(skuInput);
                        skuValido = true;
                    }
                });
        });
    }

    formulario.addEventListener('submit', (e) => {
        let valido = true;

        inputs.forEach(input => {
            const value = input.value.trim();

            if (!value) {
                setInvalid(input, 'Este campo es requerido');
                valido = false;
            } else if ((input.name === 'cantidad' || input.name === 'precio') && Number(value) < 1) {
                setInvalid(input, 'El valor debe ser mayor o igual a 1');
                valido = false;
            } else {
                if (input.name !== 'sku' || (input.name === 'sku' && skuValido)) {
                    setValid(input);
                } else {
                    valido = false;
                }
            }
        });

        if (!valido) {
            e.preventDefault();
        }
    });

    function setInvalid(input, message) {
        input.classList.add('is-invalid');
        const errorDiv = input.nextElementSibling;

        if (errorDiv) {
            errorDiv.textContent = message;
            errorDiv.style.display = 'block';
        }
    }

    function setValid(input) {
        input.classList.remove('is-invalid');
        const errorDiv = input.nextElementSibling;

        if (errorDiv) {
            errorDiv.textContent = '';
            errorDiv.style.display = 'none';
        }
    }
});
