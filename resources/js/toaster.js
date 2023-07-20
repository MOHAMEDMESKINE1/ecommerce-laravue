import { useToast } from 'vue-toastification';

// const toast = useToast();
export function  showToast(message,options = {}) {
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
