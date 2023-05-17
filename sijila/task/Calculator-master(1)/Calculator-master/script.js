const keys = document.querySelectorAll('.key');
const display_input = document.querySelector('.display .input');
const display_output = document.querySelector('.display .output');
let historyList = document.querySelector(".history-list");

let input = "";

for (let key of keys) {
  const value = key.dataset.key;

  key.addEventListener('click', () => {
    switch (value) {
      case "clear":
        input = "";
        display_input.innerHTML = "";
        display_output.innerHTML = "";
        break;
      case "backspace":
        input = input.slice(0, -1);
        display_input.innerHTML = GetInput(input);
        break;
      case "=":
        let result = eval(PrepareInput(input).preparedInput);
        let calculation = GetOutput(result, input);
        display_output.innerHTML = calculation.output;
        AddToHistory(calculation);
        break;
      case "brackets":
        if (
          input.indexOf("(") == -1 ||
          (input.indexOf("(") != -1 &&
            input.indexOf(")") != -1 &&
            input.lastIndexOf("(") < input.lastIndexOf(")"))
        ) {
          input += "(";
        } else if (
          input.indexOf("(") != -1 &&
          (input.indexOf(")") == -1 ||
            (input.indexOf("(") != -1 &&
              input.indexOf(")") != -1 &&
              input.lastIndexOf("(") > input.lastIndexOf(")")))
        ) {
          input += ")";
        }

        display_input.innerHTML = GetInput(input);
        break;
      default:
        if (ValidateInput(value)) {
          input += value;
          display_input.innerHTML = GetInput(input);
        }
    }
  });
}



function GetInput(input) {
  let input_array = input.split("");
  let input_array_length = input_array.length;
  let output_array = [];

  for (let i = 0; i < input_array_length; i++) {
      let char = input_array[i];
      let last_char = output_array[output_array.length - 1];

      if (char == "*") {
          char = "x";
      } else if (char == "/") {
          char = "÷";
      }

      if (isNaN(parseInt(char)) && last_char != undefined && !isNaN(parseInt(last_char))) {
          // If the current character is an operator and the last character was a number,
          // add the operator to the last number instead of creating a new span element
          output_array[output_array.length - 1] += ` <span class="operator">${char}</span> `;
      } else {
          if (char == "+") {
              char = "";
          } else if (char == "-") {
              char = "";
              output_array.push(char);
              continue;
          }

          if (char == "(") {
              output_array.push(`<span class="brackets">${char}</span>`);
          } else if (char == ")") {
              output_array.push(`<span class="brackets">${char}</span>`);
          } else if (char == "%") {
              output_array.push(`<span class="percent">${char}</span>`);
          } else {
              output_array.push(char);
          }
      }
  }

  return output_array.join("");
}




function GetOutput(output, input) {
  let output_string = output.toString();
  let decimal = output_string.split(".")[1];
  output_string = output_string.split(".")[0];

  let output_array = output_string.split("");

  if (output_array.length > 3 && !isNaN(output_array)) {
    for (let i = output_array.length - 3; i > 0; i -= 3) {
      output_array.splice(i, 0, ",");
    }
  }

  if (decimal) {
    output_array.push(".");
    output_array.push(decimal);
  }

  return {
    input: input,
    output: output_array.join("")
  };
}
function ValidateInput(value) {
  let last_input = input.slice(-1);
  let operators = ["+", "-", "*", "/","%"];

  if (value == "." && last_input == ".") {
      return false;
  }

  if (operators.includes(value)) {
      if (operators.includes(last_input)) {
          // If last input was also an operator, replace it with the new operator
          input = input.slice(0, -1) + value;
          display_input.innerHTML = GetInput(input);
          return false;
      } else {
          return true;
      }
  }
  return true;
}

function PrepareInput(input) {
  let input_array = input.split("");

  for (let i = 0; i < input_array.length; i++) {
    if (input_array[i] == "%") {
      let j = i - 1;
      let operand = "";
      while (/[0-9\.]/.test(input_array[j])) {
        operand = (input_array[j] + operand) * 10;
        j--;
      }
      if (j == i - 1) {
        let expression = parseFloat(input_array.slice(0, i).join("")) * 0.01;
        input_array.splice(0, i + 1, expression.toString());
      } else {
        let percent = parseFloat(operand) * 0.01;
        let expression = percent * parseFloat(input_array.slice(j + 1, i).join(""));
        input_array.splice(j + 1, i - j, expression.toString());
      }
      i = j + 1;
    }
  }

  return {
    input: input,
    preparedInput: input_array.join("")
  };
}

function AddToHistory(calculation) {
  let li = document.createElement("li");
  li.innerHTML = `${calculation.input} = ${calculation.output}`;
  historyList.appendChild(li);
}

