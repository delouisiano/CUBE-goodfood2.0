import React from 'react';
import { View, Text, Image, StyleSheet, TouchableOpacity } from 'react-native';
import Icon from 'react-native-vector-icons/Ionicons';


const Account = ({ route }) => {

    return (
        
            <View style={styles.cart}>
                <Text style={styles.placeholder}>Ici Bientôt votre compte. (inch)</Text>
            </View>
    );
};


const styles = StyleSheet.create({
    cart: {
        alignItems: 'center',
        justifyContent: 'center'
    },
    placeholder: {
        fontWeight: 'bold'
    }
});

export default Account;