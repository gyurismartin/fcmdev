function szimulal(number, lambda, iteration){
	//kapcsolati mátrix megadása
	matrix  = [[-0.5,1],[0.25,0.5]];
	//kezdeti állapotvektor megadása
	init = [0.5,0.5];
	eredmenyek = new Array(iteration);
	for(var j=0;j<iteration;j++){
		window.eredmenyek[j] = new Array(number);
	}
	var akt = 0;
	var summ = 0;
	var summary = 0;
	
	//az első időpillanat kiszámítása
	for(var i=0;i<number;i++){
		summ = 0;
		for(var j=0; j<number; j++){
			akt = 0;
			akt = matrix[j][i] * window.init[j];
			summ = summ + akt;
		}
		summary = 1/(1+Math.exp((-1)*lambda*summ));
		summary = summary.toFixed(2);
		eredmenyek[0][i] = summary;
	}
	//további időpillanatok
	for(k=1;k<iteration;k++){
		summary = 0;
		for(var i=0;i<number;i++){
			summ = 0;
			for(var j=0; j<number; j++){
				akt = 0;
				akt = matrix[j][i] * window.eredmenyek[k-1][j];
				summ = summ + akt;
			}
			summary = 1/(1+Math.exp((-1)*lambda*summ));
			summary = summary.toFixed(2);
			eredmenyek[k][i] = summary;
		}	
	}
	//kiválasztott időpillanatban az állapotvektort kell, hogy visszaadja
	return eredmenyek[4];
}

describe("Az elso allapotvektor szimulalasa", () => {
    it("Az ertekek megegyeznek", () => {
        //Kiválasztott időpillanatban az állapotvektor
        var selected = [0.47,0.99];
		selected[0] = selected[0].toFixed(2);
		selected[1] = selected[1].toFixed(2);
		
        //szimuláció metódus(mátrix nagysága, lambda, iterációk szám értékekkel)
        const result = szimulal(2,5,10);

        //tesztelés
        expect(result).toEqual(selected);
    })
});