import { useToast } from 'vue-toastification';
import Swal from 'sweetalert2';
// const toast = useToast();
export function  successToast(message,options = {}) {
  const toast = useToast();
  toast.success(message, {
    timeout: 1500, // Duration in milliseconds (3 seconds)
    closeOnClick: true, // Close the toast when clicked
    pauseOnFocusLoss: false, // Continue showing toast even if the window loses focus
    pauseOnHover: true, // Pause the toast duration when hovering over it
    draggable: true, // Allow the user to drag the toast
    hideProgressBar: false, // Show the progress bar while the toast is visible
    closeButton: 'button', // Custom close button selector
    ...options,
  });
}
export function  errorToast(message,options = {} ) {
  const toast = useToast();
  toast.error(message, {
    timeout: 1500, // Duration in milliseconds (3 seconds)
    closeOnClick: true, // Close the toast when clicked
    pauseOnFocusLoss: false, // Continue showing toast even if the window loses focus
    pauseOnHover: true, // Pause the toast duration when hovering over it
    draggable: true, // Allow the user to drag the toast
    hideProgressBar: false, // Show the progress bar while the toast is visible
    closeButton: 'button', // Custom close button selector
    ...options,
  });
}


export function showConfirmation(title, text, confirmButtonText, cancelButtonText) {
  return new Promise((resolve) => {
    Swal.fire({
      title: title || 'Are you sure?',
      text: text || 'This action cannot be undone!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: confirmButtonText || 'Yes, proceed!',
      cancelButtonText: cancelButtonText || 'No, cancel!',
    }).then((result) => {
      if (result.isConfirmed) {
        resolve(true); // User clicked the "Confirm" button
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        resolve(false); // User clicked the "Cancel" button
      }
    });
  });
}

