SpainValidatorBundle
================

Bundle que posibilita la validación de datos específicos de España.

El listado de estos datos es:

 - Teléfono fijo
 - Teléfono móvil
 - Cualquier teléfono
 - Código postal
 - DNI
 - CIF
 - DNI Y CIF

## Instalación

Lanzamos instalación mediante Composer
```bash

$  php composer.phar require avegao/spain-validator-bundle


```

Registramos el bundle en nuestra instalación de Symfony:
```php
<?php
// app/AppKernel.php
public function registerBundles()
{
    return array(
        // ...
        new Xinjia\SpainValidatorBundle\XinjiaSpainValidatorBundle(),
        // ...
    );
}
```
## Ejemplo de uso

```php
<?php

namespace AppBundle\Entity;

// Validación extra, telefono, DNI/NIF...
use Xinjia\SpainValidatorBundle\Validator as ExtraAssert;

/**
 * MyEntity
 *
 */
class MyEntity {

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255, nullable=true)
     *
     * @Assert\Length(
     *      max = 9,
     *      maxMessage = "El teléfono debe tener {{ limit }} números"
     * )
     *
     * @ExtraAssert\AllPhone(message="No es un teléfono válido")
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonoFijo", type="string", length=255, nullable=true)
     *
     * @Assert\Length(
     *      max = 9,
     *      maxMessage = "El teléfono debe tener {{ limit }} números"
     * )
     *
     * @ExtraAssert\Phone(message="No es un teléfono fijo válido")
     */
    private $telefonoFijo;
    
    /**
     * @var string
     *
     * @ORM\Column(name="telefonoMovil", type="string", length=255, nullable=true)
     *
     * @Assert\Length(
     *      max = 9,
     *      maxMessage = "El teléfono debe tener {{ limit }} números"
     * )
     *
     * @ExtraAssert\MobilePhone(message="No es un teléfono móvil válido")
     */
    private $telefonoMovil;
    
    /**
     * @var string
     *
     * @ORM\Column(name="codigoPostal", type="string", length=255, nullable=true)
     *
     * @ExtraAssert\ZipCode(message="No es un código postal válido")
     */
    private $codigoPostal;

    /**
     * @var string
     *
     * @ORM\Column(name="dniCif", type="string", length=255, nullable=true)
     *
     * @ExtraAssert\DniCif(message="No es un DNI o CIF válido")
     */
    private $dniCif;

    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=255, nullable=true)
     *
     * @ExtraAssert\Dni(message="No es un DNI válido")
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="cif", type="string", length=255, nullable=true)
     *
     * @ExtraAssert\Cif(message="No es un CIF válido")
     */
    private $cif;

}
```
