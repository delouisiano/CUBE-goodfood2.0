import React, { useState, useEffect, useRef } from 'react';
import { StyleSheet, AppState } from 'react-native';
import { NavigationContainer } from '@react-navigation/native';
import { createStackNavigator } from '@react-navigation/stack';
import AsyncStorage from '@react-native-async-storage/async-storage';
import SignUp from './pages/SignUp';
import SignIn from './pages/SignIn';
import Home from './pages/home';
import Restaurant from './pages/restaurant';
import { createContext } from 'react';
import Cart from './pages/Cart';

const mockData = [
  {
    id: 1,
    title: 'Article 1',
    price: 10,
    image: 'https://via.placeholder.com/150'
  },
  {
    id: 2,
    title: 'Article 2',
    price: 20,
    image: 'https://via.placeholder.com/150'
  },
  {
    id: 3,
    title: 'Article 3',
    price: 30,
    image: 'https://via.placeholder.com/150'
  }
];

export const CartContext = createContext({
  data: mockData,
  setCart: () => { }
});
const Stack = createStackNavigator();

const App = () => {
  const [cart, setCart] = useState(mockData);
  const [isLoggedIn, setIsLoggedIn] = useState(false);
  const signOutTimer = useRef(null);

  useEffect(() => {
    // Retrieve the isLoggedIn value from AsyncStorage when the app is launched
    const getIsLoggedIn = async () => {
      try {
        const value = await AsyncStorage.getItem('isLoggedIn');
        if (value !== null) {
          setIsLoggedIn(JSON.parse(value));
        }
      } catch (error) {
        // Handle error
      }
    };
    getIsLoggedIn();
    // Listen for changes in the app's state
    AppState.addEventListener('change', handleAppStateChange);

    // Remove the event listener when the component is unmounted
    return () => {
      AppState.removeEventListener('change', handleAppStateChange);
    };
  }, []);

  const handleSignIn = async () => {
    // handle SignIn logic here
    setIsLoggedIn(true);
    // Save the isLoggedIn value to AsyncStorage
    try {
      await AsyncStorage.setItem('isLoggedIn', JSON.stringify(true));
    } catch (error) {
      // Handle error
    }
  };
  const handleSignOut = async () => {
    // handle SignOut logic here
    setIsLoggedIn(false);
    // Clear the isLoggedIn value from AsyncStorage
    try {
      await AsyncStorage.removeItem('isLoggedIn');
    } catch (error) {
      // Handle error
    }
  };

  const handleAppStateChange = async (nextAppState) => {
    if (nextAppState === 'background') {
      // The app is being moved to the background
      // Start a timer that will sign out the user after 5 minutes
      signOutTimer.current = setTimeout(handleSignOut, 60);
    } else if (nextAppState === 'active') {
      // The app is being moved to the foreground
      // Cancel the sign-out timer if it's running
      if (signOutTimer.current) {
        clearTimeout(signOutTimer.current);
        signOutTimer.current = null;
      }
    }
  };
  return (
    <NavigationContainer>
      <Stack.Navigator>
        {isLoggedIn ? (
          <>
            <Stack.Screen name="Home" component={Home} />
            <Stack.Screen name="Cart " component={Cart} initialParams={{ cartContent: cart }} />
            <Stack.Screen name="Restaurant" component={Restaurant} />
          </>
        ) : (
          <>
            <Stack.Screen name="SignIn">
              {props => <SignIn {...props} onSignIn={handleSignIn} />}
            </Stack.Screen>
            <Stack.Screen name="SignUp" component={SignUp} />
          </>
        )}
      </Stack.Navigator>
    </NavigationContainer>
  );
};
export default App;