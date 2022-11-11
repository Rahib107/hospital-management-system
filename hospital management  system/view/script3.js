const name = document.getElementById('fname')
const lname = document.getElementById('lname')
const email = document.getElementById('email')
const gender = document.getElementById('gender')
const birthday = document.getElementById('birthday')
const form = document.getElementById('form')
const address = document.getElementById('address')
const phone = document.getElementById('phone')
const errorElement = document.getElementById('error')

form.addEventListener('submit', (e) => {
  let messages = []
  if (name.value === '' || name.value == null) {
    messages.push('Name is required')
  }

   if (email.value === '' || email.value == null) {
    messages.push('email is required')
  }


  if (lname.value === '' || email.value == null) {
    messages.push('lastname is required')
  }

  

  if (birthday.value === '' || birthday.value == null) {
    messages.push('birthday is required')
  }

  

  


  if (messages.length > 0) {
    e.preventDefault()
    errorElement.innerText = messages.join(', ')
  }
})