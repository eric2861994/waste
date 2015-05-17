import bcrypt, random

def generate_mySQL_insert_query():
	return ("INSERT INTO ppl_dukcapil_ktp (nik, password, nama, username, email, kota_lahir,\n"
		"tanggal_lahir, jenis_kelamin, gol_darah, alamat, rt, rw, kel_desa, kec, kota_kab,\n"
		"kode_pos, agama, status, kewarganegaraan, foto, ttd, tgl_kadaluarsa,\n"
		"kota_dikeluarkan, prov_dikeluarkan, tgl_dikeluarkan, role, created_at, updated_at) VALUES")

def generate_mySQL_values(id):
	return ("('{0}', '{1}', '{0}', '{0}', '{0}@wastebdg.com', 'Bandung', '1994-05-17',\n"
		"'{2}, 'O', 'Jalan persampahan No. {3}', 10, 20, '-', 'Bandung Kota', 'Bandung',\n"
		"40141, 'Islam', 'Belum Menikah', '', '', '', '0000-00-00', '', '', '0000-00-00',\n"
		"'{4}', '2015-05-17 03:48:01', '2015-05-17 03:48:01'),").format('waste%03d'%id,
		bcrypt.hashpw('waste%03d'%id, bcrypt.gensalt(14)), 
		random.choice(('laki-laki', 'perempuan')), '%03d'%(id+1), get_role(id))

def get_role(id):
	if (id <= 60):
		return 'waste_penyapu'
	elif (id <= 140):
		return 'waste_pengangkut'
	elif (id <= 160):
		return 'waste_tps'
	elif (id < 170):
		return 'waste_pemantau'
	else:
		return 'masyarakat'

def main():
	for i in range(1, 200):
		if i % 50 == 0:
			print generate_mySQL_insert_query()
		print generate_mySQL_values(i)

if __name__ == '__main__':
	main()