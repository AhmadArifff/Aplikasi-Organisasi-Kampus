"use strict";
var cleaveC = new Cleave('.currency', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
});
var cleaveHA = new Cleave('.hargaasli', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
});
var cleaveHJ = new Cleave('.hargajual', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
});
var cleaveI = new Cleave('.insentive ', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
});
var cleaveCB = new Cleave('.cashback', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
});
var cleaveL = new Cleave('.laba', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
});