function removes(selected) {
    var selectBox = document.createElement("select");
    for (i = 0; i < 5; i++) {
        var option = document.createElement("option");
        selectBox.add(option);
    }
    selectBox.remove(selectBox.options[selected].index);
    return selectBox.options.length;
}

describe("Torles a listabol", () => {
    it("Kitoroljuk", () => {
        //kiv�lasztott index a list�ban
        var selected = 2;

        //t�rl�s met�dus
        const result = removes(selected);

        //tesztel�s
        expect(result).toBe(4);
    })
});