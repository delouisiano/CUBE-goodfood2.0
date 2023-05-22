import { createStackNavigator } from 'react-navigation-stack';
import { createAppContainer } from 'react-navigation';
import Login from '../pages/login';
import Home from '../pages/home';

const screens = {
    Home: {
        screen: Home
    },
    Login: {
        screen: Login
    }
}

const stack = createStackNavigator(screens);

export default createAppContainer(stack);