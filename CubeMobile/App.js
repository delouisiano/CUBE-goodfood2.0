import SignUp from './pages/SignUp';
import SignIn from './pages/SignIn';
import Home from './pages/Home';
import React, { useState } from 'react';
import { StyleSheet, View, Text, Image, Button, ScrollView, SafeAreaView } from 'react-native';
import { NavigationContainer } from '@react-navigation/native';
import { createStackNavigator } from '@react-navigation/stack';

const Stack = createStackNavigator();

// Define the main component that renders the cards in grid
const App = () => {
  const [isLoggedIn, setIsLoggedIn] = useState(false);

  const handleSignIn = () => {
    // handle SignIn logic here
    setIsLoggedIn(true);
  };
  return (
    <SafeAreaView style={styles.container}>
      <ScrollView style={styles.scrollView}>
        {isLoggedIn ? (
          <>
            <Home />
          </>
        ) : (
          <>
            <SignUp />
            <SignIn onSignIn={handleSignIn} />
          </>
        )}
      </ScrollView>
    </SafeAreaView>
  );
};

// Define some styles for the components
const styles = StyleSheet.create({
  container: {
    flex: 1,
    flexDirection: 'row',
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#fff',
  },
  scrollView: {
    backgroundColor: 'pink',
    marginHorizontal: 20,
  }
});

export default App;
