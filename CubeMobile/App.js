import React, { useState, useEffect } from 'react';
import { StyleSheet, AppState } from 'react-native';
import { NavigationContainer } from '@react-navigation/native';
import { createStackNavigator } from '@react-navigation/stack';
import AsyncStorage from '@react-native-async-storage/async-storage';
import SignUp from './pages/SignUp';
import SignIn from './pages/SignIn';
import Home from './pages/home';
import Restaurant from './pages/restaurant';

const Stack = createStackNavigator();

const App = () => {
  const [isLoggedIn, setIsLoggedIn] = useState(false);

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

  const handleAppStateChange = async (nextAppState) => {
    if (nextAppState === 'background') {
      // The app is being moved to the background (i.e. it's being closed)
      // Set isLoggedIn to false and clear it from AsyncStorage
      setIsLoggedIn(false);
      try {
        await AsyncStorage.removeItem('isLoggedIn');
      } catch (error) {
        // Handle error
      }
    }
  };

  return (
    <NavigationContainer>
      <Stack.Navigator>
        {isLoggedIn ? (
          <>
            <Stack.Screen name="Home" component={Home} />
            <Stack.Screen name="Restaurant" component={Restaurant} />
          </>
        ) : (
          <>
            <Stack.Screen name="SignUp" component={SignUp} />
            <Stack.Screen name="SignIn">
              {props => <SignIn {...props} onSignIn={handleSignIn} />}
            </Stack.Screen>
          </>
        )}
      </Stack.Navigator>
    </NavigationContainer>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    flexDirection: 'row',
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#fff',
  },
});

export default App;
