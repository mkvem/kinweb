### Customer Create ###

URL : /api/user/create_user

Description:
Digunakan untuk mendaftarkan device ataupun mengecek apakah device sudah diapprove atau belum

Header: 
Content-Type: application/json
Authorization: yWnCVRW26zIJ8aFVv5cV1I4S751095hf

Type: post

Data: {"name": "Miki", "imei": "352066060926230"}

#######################################################

### Get All Gudang List ###

URL : /api/gudang/getGudang/{status}/{imei}

Description:
Untuk mengambil data gudang yang dimappingkan kepada seorang user dan gudang tersebut memiliki item yang dapat diapprove atau dicek.

Parameter:
status : masuk untuk barang masuk
imei : imei dari device

Type : get

#######################################################

### Get all barang masuk di gudang tertentu ###

URL : /barang/getShipmentList/{id}/{imei}

Description:
Untuk mengambil data list barang masuk dalam gudang tertentu

Parameter:
id : id gudang
imei : imei dari device

Type : get

#####################################################

### Update status barang setelah dicek ###

URL : /barang/approve/masuk/{barcode}/{imei}

Description:
Untuk update status bahwa barang telah dicek

Parameter:
barang : barcode barang
imei : imei dari device

Type : get

####################################################

### Get Detail Barang Masuk ###

URL : /barang/detail/masuk/{id}/{barcode}/{imei}

Description:
Mendapatkan detail/data suatu barang berdasarkan id gudang dan barcode barang

Parameter :
id : id gudang
barcode : is dari barang
imei : imei dari device

###################################################

### Search Barang ###

URL : /barang/search/masuk/{id}/{imei}/{keyword?}

Description:
Untuk mencari barang berdasarkan keyword yang ada

Parameter:
id : id gudang
imei : imei dari device
keyword : kata kunci yang ingin dicari

####################################################