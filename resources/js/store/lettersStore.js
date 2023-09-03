import axios from 'axios';
import { defineStore } from 'pinia';

export const useLettersStore = defineStore({
  id : 'letters',
  state: () => ({
    letters: [],
  }),
  
  actions: {
   

    // Read all letters
    async getLetters() {
       try {
          const response = await axios.get("/api/letters");
          this.letters = response.data  ; 
          console.log(response.data);
       } catch (error) {
          console.log("ERROR GetLetters : "+ error);
       }
    },
    // Create a new letter
    async saveLetter(newLetter) {
      await axios.post("/api/letters/store",newLetter);
      this.getLetters();
    },
    

  async  deleteLetter(id) {
      try {
         await axios.delete(`/api/letters/${id}`);
         this.getLetters();
       
     } catch (error) {
        console.log("ERROR DeleteLetter : "+ error);
     }
    },
  },
});
