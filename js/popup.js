document.addEventListener('DOMContentLoaded', function () {
    var popup = document.querySelector('.popup');

    window.openPopup = function (price, imgName) {
        var priceElement = document.getElementById('price');
        var imgElement = document.createElement('img'); 

imgElement.style.margin = 'auto';
imgElement.style.display = 'block'; 

imgElement.src = 'images/products/' + imgName;

imgElement.alt = 'Product Image'; // Add alt text for accessibility

imgElement.style.width = '200px'; // Change the width as needed

imgElement.style.height = '200px'; // Change the height as needed

// Customize the content of the popup based on the data
priceElement.textContent = 'Price: ₱' + price;
priceElement.style.textAlign = 'center';


// Clear previous content and append the img element
popupProductInfo.innerHTML = '';
        popupProductInfo.appendChild(imgElement);


// Show the popup
        popup.style.display = 'block';
    }

    window.closePopup = function () {
        popup.style.display = 'none';
    }
});
