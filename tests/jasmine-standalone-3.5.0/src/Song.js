function szamitas(number, time, lambda) {
    init = [[0, 0], [0.25, 0.25], [0.5, 0.5], [0.75, 0.75], [1, 1]];
    matrix = [[-0.5, 1], [0.25, 0.5]];
    eremat = new Array(number);
    for (var j = 0; j < number; j++) {
        eremat[j] = new Array(2);
    }
    var akt, sum, summary = 0;
    for (var j = 2; j < time + 2; j++) {
        summary = 0;
        for (var i = 1; i < number + 1; i++) {
            if (j === 2) {
                sum = 0;
                for (var k = 0; k < number; k++) {
                    akt = 0;
                    akt = matrix[k][i - 1] * init[0][k];
                    sum = sum + akt;
                }
                summary = 1 / (1 + Math.exp((-1) * lambda * sum));
                summary = summary.toFixed(2);
                eremat[i - 1][0] = summary;
                /*window.diagram[j - 1][i - 1] = summary;
                window.diagram[time + 1][i - 1] = 1;*/
            }
            for (var l = 0; l < number; l++) {
                eremat[l][1] = eremat[l][0];
            }
            if (i === number) {
                break;
            }
        }
        if (j === time + 1) {
            break;
        }
    }
    return eremat[1][1];
}

describe("Get numbers", () => {

    it("it should be sumed", () => {
        var number = 2;
        var time = 10;
        var lambda = 5;

        const result = szamitas(number, time, lambda);
        expect(result).toBe(0.99);
    })

});