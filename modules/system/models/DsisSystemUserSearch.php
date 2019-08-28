<?php

namespace app\modules\system\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\system\models\DsisSystemUser;

/**
 * app\modules\system\models\DsisSystemUserSearch represents the model behind the search form about `app\modules\system\models\DsisSystemUser`.
 */
 class DsisSystemUserSearch extends DsisSystemUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'role_id'], 'integer'],
            [['name', 'username', 'password', 'authKey', 'accessToken', 'status', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DsisSystemUser::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->orderBy(['created_at' => SORT_DESC]);
        $query->where('role_id<>1');
        
        $query->andFilterWhere([
            'id' => $this->id,
            'role_id' => $this->role_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'authKey', $this->authKey])
            ->andFilterWhere(['like', 'accessToken', $this->accessToken])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
