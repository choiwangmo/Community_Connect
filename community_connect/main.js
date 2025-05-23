
console.log("JS working ✅");


// Show modal with event details
document.querySelectorAll('.detail-btn').forEach(button => {
    button.addEventListener('click', function (e) {
      e.preventDefault();
      const title = this.dataset.title;
      const desc = this.dataset.description;
  
      document.getElementById('modalTitle').innerText = title;
      document.getElementById('modalDesc').innerText = desc;
  
      document.getElementById('eventModal').style.display = 'flex';
    });
  });
  
  // Hide modal
  document.getElementById('closeModal').addEventListener('click', function () {
    document.getElementById('eventModal').style.display = 'none';
  });
  
  
  
  
  // form
  
  document.addEventListener("DOMContentLoaded", function () {
    console.log("JS working ✅");
  
    const form = document.getElementById("registrationForm");
  
    // Only run form logic if the form exists (i.e., we're on register.html)
    if (form) {
      form.addEventListener("submit", function (e) {
        e.preventDefault();
  
        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();
        const event = document.getElementById("selectedEvent").value;
  
        if (!name || !email || !event) {
          showAlert("❌ Please fill in all required fields.");
          return;
        }
  
        showAlert(`✅ Thank you, ${name}! Your registration for "${event}" was submitted successfully.`);
        form.reset();
      });
    }
  
    // Reusable alert that shows centered
    function showAlert(message) {
      const popup = document.createElement("div");
      popup.className = "custom-alert";
      popup.innerText = message;
      document.body.appendChild(popup);
  
      setTimeout(() => {
        popup.remove();
      }, 3500);
    }
  });
  