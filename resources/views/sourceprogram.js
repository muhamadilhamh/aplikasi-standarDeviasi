//Data dari skripsi
const data_Count = Object.values(JSON.parse('<?= json_encode($dataProvinsi) ?>'));

//Menghitung Standar Deviasi
	function dev(arr) {
		// membuat nilai rata-rata dengan array.reduce
		let mean = arr.reduce((acc, curr) => {
			return acc + curr
		}, 0) / arr.length;

		// menghitung (value tiap data - rata2) ^2
		arr = arr.map((k) => {
			return (k - mean) ** 2
		})

		// menjumlahkan data pada array
		let sum = arr.reduce((acc, curr) => acc + curr, 0);

		// mengembalikan nilai standar deviasi
		return Math.sqrt(sum / ((arr.length) - 1))
	}

	// console.log(dev(data_Count))
    
	const std = dev(data_Count);

    //Mengambil nilai rata-rata untuk rata2 max rata2 min
	let average = (array) => array.reduce((a, b) => a + b) / array.length;
	// console.log(average(data_Count));
	const avg = average(data_Count);
	

	const n = parseFloat(prompt('Masukan nilai n untuk menampilkan sebaran kuliner tradisional: '));
	
	const x = (n * std);
	const positif = (avg + x);
	const negatif	= (avg - x);
	

	const format_positif = math.round(positif);
	const format_negatif = math.round(negatif);