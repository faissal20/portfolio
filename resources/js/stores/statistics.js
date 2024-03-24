import { defineStore } from 'pinia'

export const useStatisticsStore = defineStore('Statistics', {
    state: () => ({
        _heartStorage: null,
        _knowledge: null,
        _missing: null,
        _happiness: null,
        _madeForEachOther: null,
        _daroriyat: null,
    }),

    getters: {
        heartStorage: (state) => state._heartStorage,
        knowledge: (state) => state._knowledge,
        missing: (state) => state._missing,
        happiness: (state) => state._happiness,
        madeForEachOther: (state) => state._madeForEachOther,
        daroriyat: (state) => state._daroriyat,
        allStatistics : (state) => {
            state._heartStorage,
            state._knowledge,
            state._missing,
            state._happiness,
            state._madeForEachOther,
            state._daroriyat
        }
    },

    actions: {
        setStatistics(data) {
            this.setHeartStorage(data.heartStorage)
            this.setKnowledge(data.knowledge)
            this.setMissing(data.missing)
            this.setHappiness(data.happiness)
            this.setMadeForEachOther(data.madeForEachOther)
            this.setDaroriyat(data.daroriyat)
        },

        setDaroriyat(value) {
            if(value === null) this._daroriyat = 0
            else if(value > 100) this._daroriyat = 100
            else if(value < 0) this._daroriyat = 0
            else this._daroriyat = value
        },

        setHeartStorage(value) {
            if(value === null) this._heartStorage = 0
            else if(value > 100) this._heartStorage = 100
            else if(value < 0) this._heartStorage = 0
            else this._heartStorage = value
        },

        setKnowledge(value) {
            console.log(value);
            if(value === null) this._knowledge = 0
            else if(value > 100) this._knowledge = 100
            else if(value < 0) this._knowledge = 0
            else this._knowledge = value
        },

        setMissing(value) {
            if(value === null) this._missing = 0
            else if(value > 100) this._missing = 100
            else if(value < 0) this._missing = 0
            else this._missing = value
        },

        setHappiness(value) {
            if(value === null) this._happiness = 0
            else if(value > 100) this._happiness = 100
            else if(value < 0) this._happiness = 0
            else this._happiness = value
        },

        setMadeForEachOther(value) {
            if(value === null) this._madeForEachOther
            else if(value > 100) this._madeForEachOther = 100
            else if(value < 0) this._madeForEachOther = 0
            else this._madeForEachOther = value
        },
    
    }
})
