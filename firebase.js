// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getFirestore } from "firebase/firestore";
import { getAnalytics } from "firebase/analytics";

// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyB3VksxgoFiOJyOHJLXvdiGKUBC5PnbedM",
  authDomain: "baratto-81fe3.firebaseapp.com",
  projectId: "baratto-81fe3",
  storageBucket: "baratto-81fe3.appspot.com",
  messagingSenderId: "628924978969",
  appId: "1:628924978969:web:b6a41ce8735fb71ca39788",
  measurementId: "G-N7XCDFSN1H"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
export const db = getFirestore(app);

