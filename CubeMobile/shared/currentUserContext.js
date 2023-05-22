import React, { useState, useEffect, createContext, useContext } from 'react';

// Define a context for the current user
export const CurrentUserContext = createContext();

// Define a provider component that fetches and provides the current user
export const CurrentUserProvider = ({ children }) => {
    // Define a state variable to store the current user
    const [currentUser, setCurrentUser] = useState(null);

    // Define a function to fetch the current user from the backend
    const fetchCurrentUser = async () => {
        try {
            // Make an API call to get the current user data
            //const response = await fetch('/api/users/current');
            //const data = await response.json();

            // Update the state with the fetched data
            setCurrentUser({
                email: '',
                isConnected: false
            });
        } catch (error) {
            // Handle any errors
            console.error(error);
        }
    };

    // Call the fetch function once when the component mounts
    useEffect(() => {
        fetchCurrentUser();
    }, []);

    // Return the provider component with the current user and the fetch function as values
    return (
        <CurrentUserContext.Provider value={{ currentUser, fetchCurrentUser }}>
            {children}
        </CurrentUserContext.Provider>
    );
};

// Define a custom hook that returns the current user and the fetch function
export const useCurrentUser = () => {
    // Use the useContext hook to access the current user context
    const context = useContext(CurrentUserContext);

    // If the context is undefined, it means the provider is missing
    if (context === undefined) {
        throw new Error('useCurrentUser must be used within a CurrentUserProvider');
    }

    // Return the context value
    return context;
};
