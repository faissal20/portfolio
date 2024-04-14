import { defineStore } from "pinia";

export const useMyStatisticsStore = defineStore("myStatistics", {
    state: () => ({
        _heartStorage: 0,
        _knowledge: 0,
        _missing: 0,
        _happiness: 0,
        _madeForEachOther: 0,
        _daroriyat: 0,
    }),
    
    getters: {
        heartStorage: (state) => state._heartStorage,
        knowledge: (state) => state._knowledge,
        missing: (state) => state._missing,
        happiness: (state) => state._happiness,
        madeForEachOther: (state) => state._madeForEachOther,
        daroriyat: (state) => state._daroriyat,
    },
    
    actions: {


        
        setHeartStorageValue(value) {
            this._heartStorage = value;
        },
    
        setKnowledgeValue(value) {
            this._knowledge = value;
        },
    
        setMissingValue(value) {
            this._missing = value;
        },
    
        setHappinessValue(value) {
            this._happiness = value;
        },

        setDaroriyatValue(value) {
            this._daroriyat = value;
        },
        
        setMadeForEachOtherValue(value) {
            this._madeForEachOther = value;
        },
    },
});