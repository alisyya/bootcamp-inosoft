const display = document.getElementById('display');
const dot = document.getElementById('dot');
let lastElement = 'operator';

function addNumber(id) {
    let number = document.getElementById(id).textContent;
    let val = display.value;
    if (val[0] === '0'&& val[1] !== '.') {
        val = val.slice(0, -1);
        lastElement = 'operator';
    }
    if (val.length < 17) {
        val += number;
        lastElement = 'number';
    }
    display.value = val;
    console.log(`${lastElement} ${display.value}`);
}

function addOperator(id) {
    let operator = document.getElementById(id).textContent;
    let val = display.value;
    if (1 <= val.length && val.length < 16) {
        if (lastElement === 'number') {
            val += operator;
            lastElement = 'operator';
        }
        else if (lastElement === 'operator') {
            val = val.slice(0, -1) + operator;
        }
    }
    display.value = val;
    console.log(`${lastElement} ${display.value}`);
}

function setBackspace() {
    let val = display.value;
    val = val.slice(0, -1);
    display.value = val;
}

function setDeleteAll() {
    display.value = '';
    lastElement = 'operator';

    if (dot.classList.contains('unclickable')) {
        dot.classList.remove('unclickable').add('clickable')
    } else {
        return;
    }
}

function switchSign() {
    let val = display.value;
    val = val[0] === '-' ? val.slice(1) : '-' + val.slice(0);
    display.value = val;
}

function setSquare() {
    let val = display.value;
    if (val.length <= 13) {
        val = Math.pow(val, 2).toFixed(4).replace(/\.?0*$/g,'');
    } else {
        val = expo(Math.pow(val, 2), 6);

        if(val === 'Infinity') {
            val = test(val);
        }
    }
    display.value = val;
}

function setTotal() {
    let val = display.value;
    if(lastElement === 'operator') {
        return syntaxErr(val);
    }
    if (val.length <= 17) {
        val = eval(val).toFixed(4).replace(/\.?0*$/g,'');
    } else {
        val = expo(eval(val), 6);
    }
    val = test(val);
    display.value = val;
}

const expo = (x, f) => Number.parseFloat(x).toExponential(f);
function syntaxErr() {
    try {
        throw new SyntaxError('Error');
    } catch (e) {
        alert(`${e.name}: Unexpected end of input`);
        display.value = e.message;
        return display.value;
    }
}
function test(number) {
    number = parseInt(number);

    if (Number.isFinite(number)) {
        console.log('Number is NOT Infinity.');
        return number;
    }
    try {
        throw new Error('Error');
    } catch (e) {
        console.log(`${e.name}: ${e.message}`);

        if (typeof number === 'undefined') {
            alert('Value is undefined!');
            return e.message;
        }
        alert('Value is Infinity!');
        return e.message;
    }
}

display.addEventListener('keydown', e => e.preventDefault());

document.addEventListener('click', e => {

    const clicked = e.target;

    if (display.value === 'Error') {
        if (clicked.id === 'ac') {
            setDeleteAll();
        } else {
            return;
        }
    }

    if (clicked.classList[0] === 'number') {
        addNumber(clicked.id);
    }

    if (clicked.classList[0] === 'operator') {
        if (clicked === dot) {
            dot.classList.remove('clickable');
            dot.classList.add('unclickable');
        }
        else if (clicked !== dot) {
            dot.classList.remove('unclickable');
            dot.classList.add('clickable');
        }
        addOperator(clicked.id);
    }

    if (clicked.id === 'backspace') {
        setBackspace();
    }

    if (clicked.id === 'ac') {
        setDeleteAll();
    }

    if (clicked.id === 'sign') {
        switchSign();
    }

    if (clicked.id === 'square') {
        setSquare();
    }

    if (clicked.id === 'equal') {
        setTotal();
    }
});
