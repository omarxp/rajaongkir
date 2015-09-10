## RajaOngkir Library

Raja Ongkir Library

## Requirements

1. Guzzle => [Link](https://github.com/guzzle/guzzle)
2. ApiKey from RajaOngkir [Link](http://rajaongkir.com/)

## Installing Guzzle

The recommended way to install Guzzle is through
[Composer](http://getcomposer.org).

```
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version of Guzzle:

```
composer.phar require guzzlehttp/guzzle
```

## How to use

```
require 'Library/RajaOngkir.php';

$ro = new RajaOngkir;

echo $ro->getProp();
echo $ro->getProp(array('id'=>1));

echo $ro->getKota();
echo $ro->getKota(array('province'=>5,'id'=>501));

echo $ro->getBiaya(array('origin'=>501,'destination'=>114,'weight'=>100,'courier'=>'jne'));


/*
Function : getProp
Description : digunakan untuk mendapatkan daftar propinsi yang ada di Indonesia.

Parameter :
	id = id propinsi (opsional)

Usage without parameter :
	echo $ro->getProp();

Usage with parameter :
	echo $ro->getProp(array('id'=>1));
*/

/*
Function : getKota
Description : digunakan untuk mendapatkan daftar kota/kabupaten yang ada di Indonesia.

Parameter :
	province = id propinsi (opsional)
	id = id kota (opsional)

Usage without parameter :
	echo $ro->getKota();

Usage with parameter :
	echo $ro->getKota(array('province'=>5,'id'=>501));
*/

/*
Function : getBiaya
Description : digunakan untuk mengetahui tarif pengiriman (ongkos kirim) dari dan ke kota tujuan tertentu dengan berat tertentu pula.

Parameter :
	origin = id kota asal pengiriman (required)
	destination = id kota tujuan (required)
	weight = berat barang dalam gram (required)
	courier = pilih salah satu antara jne,pos,tiki (required)

Usage :
	echo $ro->getBiaya(array('origin'=>501,'destination'=>114,'weight'=>100,'courier'=>'jne'));
*/
```

