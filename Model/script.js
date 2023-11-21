// Define a class for the linked list node
class ListNode {
    constructor(val) {
      this.val = val;
      this.next = null;
    }
  }
  
  // Initialize an empty array of length 10
  let arr = new Array(10);
  
  // Get inputs from the user for each array element
  for (let i = 0; i < 10; i++) {
    arr[i] = prompt(`Enter element ${i + 1} of the array:`);
  }
  
  // Convert the array into a linked list
  let dummy = new ListNode();
  let currentNode = dummy;
  
  for (let i = 0; i < arr.length; i++) {
    currentNode.next = new ListNode(arr[i]);
    currentNode = currentNode.next;
  }
  
  // The first node of the linked list is dummy.next
  let head = dummy.next;
  
  // Printing the linked list
  let result = "";
  let currentNodePrint = head;
  while (currentNodePrint !== null) {
    result += currentNodePrint.val + " -> ";
    currentNodePrint = currentNodePrint.next;
  }

  
  result += "null";
  console.log(result);
  var i = 0;

var txt = 'Im sincere,responsible,dedicate,straight forward person.I believe in connectivity because connectivity is producativity.Always i try to encourage every people confidance is my power.Im 23 years old.I was born in Brahmanbaria.I grew up in Dhaka.My school was B-Baria then i completed my HSC from Dhanmondi Ideal collage.Afterthat i went china for study then .I did completed my 2 years study .Afterworth i came bangladesh in vaccation thats time i didnt go there .Then i took decision  to admit in Daffodil Internation University department of ITM.Now im gonna say about my family.My father Businessman & Mother is housewife.We are four brother mah first brother is Softoware engineer & second brother aboard then me last but not least 4th brother doing study in class 7.So that was me and my whole family Introduction';


var speed = 10;

function typeWriter() {
  if (i < txt.length) {
    document.getElementById("demo").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);

  }
}